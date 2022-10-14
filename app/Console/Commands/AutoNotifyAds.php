<?php

namespace App\Console\Commands;

use App\Models\advertiser;
use Illuminate\Console\Command;
use App\Mail\AdvertiserDailyMail;
use App\Models\Ads;
use Illuminate\Support\Facades\Mail;

class AutoNotifyAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:notifyAds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ads = Ads::where('start_date', date("Y-m-d", strtotime('tomorrow')))->get();

        if ($ads->count() > 0)
        {
            foreach ($ads as $ad)
            {
                $advertiser_data = advertiser::where('ad_id', $ad->id)->get();
                foreach($advertiser_data as $user)
                {
                    Mail::to($user->email)->send(new AdvertiserDailyMail($user));
                }
            }
        }

        return 0;
    }
}
