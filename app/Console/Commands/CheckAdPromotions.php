<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;

class CheckAdPromotions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check:ad-promotions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate expired ad-promotions inside transactions and packages.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // For both ads (Top Ads and Bump Ads).

        try {
            // Run the ad-promotion deactivation process.

            $now = Carbon::now();

            Transaction::where('payment_type', 'ad-promotion')
                        ->where('payment_status', 'success')
                        ->whereNotNull('payment_started_datetime')
                        ->whereNotNull('payment_valid_untill_datetime')
                        ->whereNotNull('payment_due_datetime')
                        ->where('active', 1)
                        ->where('payment_valid_untill_datetime', '<=', $now)
                        ->update(['active' => 0]);

            // Process completed successfull.
            
            $this->info('`Ad Promotion` deactivation process completed successfully on '.$now.'.');

        } catch (\Throwable $th) {
            // Return error.

            $this->error('`Ad Promotion` Deactivation Error: '. $th->getMessage());
        }

    }
}
