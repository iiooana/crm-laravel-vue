<?php

namespace App\Jobs;

use App\Models\Website\Ping;
use App\Models\Website\WebsitePingSetting;
use App\Models\Website\Website;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class PingWebsitesJob implements ShouldQueue
{
    use Queueable;

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
        $current_minute = date('m');
        if( WebsitePingSetting::active()->count() > 0){
            $websites_settings = WebsitePingSetting::active()->get();
            foreach($websites_settings as $websites_settings){
                $website = $websites_settings->website;
                dump("Request : ". $website->domain);
                if($websites_settings->every_minute != 1 && $current_minute % $websites_settings->every_minute != 0 ){
                    dump("Skip");
                    continue;//skip
                }
                $request = Http::head('https://'.$website->domain);
                $array = [];
                $array['website_ping_setting_id'] = $websites_settings->id;
                $array['status_code'] =  $request->status();
                $array['headers'] = json_encode($request->headers());

                if($request->status() != 200){
                    $array['body'] = $request->body();
                    //send telegram alert
                }              
                Ping::create($array);
            }
           
        }
    }
}
