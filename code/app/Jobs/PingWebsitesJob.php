<?php

namespace App\Jobs;

use App\Models\Website\Ping;
use App\Models\Website\WebsitePingSetting;


use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

class PingWebsitesJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //php artisan schedule:work
        $current_minute = date('i');
        if (WebsitePingSetting::active()->count() > 0) {
            $websites_settings = WebsitePingSetting::active()->get();
            foreach ($websites_settings as $websites_settings) {
                $website = $websites_settings->website;
                if ($websites_settings->every_minute != 1 && $current_minute % $websites_settings->every_minute != 0) {
                    dump("Skip");
                    continue; //skip
                }
                dump("Request : " . $website->domain);
                $request = Http::head('https://' . $website->domain); //default 30s as timeout
                $array = [];
                $array['website_ping_setting_id'] = $websites_settings->id;
                $array['status_code'] =  $request->status();
                $array['headers'] = json_encode($request->headers());


                if ($request->status() != 200) {
                    Ping::create($array);
                    //send telegram alert
                    sendTelegramMessage('🔴 DANGER ' . $website->domain . ' not available - STATUS CODE: ' . $request->status() . "- " . date('H:i:s d/m/Y'));
                    sendTelegramMessage(var_export($array['headers'], true));

                    //region new request for the body
                    $request = Http::get('https://' . $website->domain); //default 30s as timeout
                    $array = [];
                    $array['website_ping_setting_id'] = $websites_settings->id;
                    $array['status_code'] =  $request->status();
                    $array['headers'] = json_encode($request->headers());
                    $array['body'] = $request->body();
                    Ping::create($array);
                    //endregion new request for the body
                } else {
                    Ping::create($array);
                }
            }
        }
    }
}
