<?php

namespace App\Jobs;

use App\Models\Website\Ping;
use App\Models\Website\WebsitePingSetting;
use App\Models\Website\Website;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
Use Telegram\Bot\Api;

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
        $current_minute = date('i');
        if( WebsitePingSetting::active()->count() > 0){
            $websites_settings = WebsitePingSetting::active()->get();
            foreach($websites_settings as $websites_settings){
                $website = $websites_settings->website;
                if($websites_settings->every_minute != 1 && $current_minute % $websites_settings->every_minute != 0 ){
                    dump("Skip");
                    continue;//skip
                }
                dump("Request : ". $website->domain);
                $request = Http::head('https://'.$website->domain);//default 30s as timeout
                $array = [];
                $array['website_ping_setting_id'] = $websites_settings->id;
                $array['status_code'] =  $request->status();
                $array['headers'] = json_encode($request->headers());

                if($request->status() != 200 || 1){
                    $array['body'] = $request->body();
                    //send telegram alert
                    $telegram = new Api(getenv('TELEGRAM_API_TOKEN'));
                    $telegram->sendMessage([
                        'chat_id' => getenv('TELEGRAM_CHAT_ID') ,
                        'text' => 'DANGER '.$website->domain.' not available - STATUS: '.$request->status()."- ".date('H:i:s d/m/Y')
                    ]);
                    $telegram->sendMessage([
                        'chat_id' => getenv('TELEGRAM_CHAT_ID') ,
                        'text' => var_export($array['headers'],true)
                    ]);
                    //php artisan schedule:work
                }              
                Ping::create($array);
            }
           
        }
    }
}
