<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunBumpAd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run:bump-ad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bump the ad according to the transaction records daily at given time.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
