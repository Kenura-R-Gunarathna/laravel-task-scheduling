<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

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

        try {
            // Start the transaction checking process.
                
            $now = Carbon::now();

            Transaction::where('payment_type', 'ad-promotion')
                        ->where('payment_status', 'success')
                        ->whereNotNull('payment_started_datetime')
                        ->whereNotNull('payment_valid_untill_datetime')
                        ->whereNotNull('payment_due_datetime')
                        ->where('active', 1)
                        ->where('payment_valid_untill_datetime', '>', $now)
                        ->with('post')
                        ->lazyById()->each(function (object $transaction) {

                $post = Post::find($transaction->id);

                $postBumpedAt = $post->bumped_at;

                $nextPostBumpedAt = Carbon::parse($postBumpedAt)->addDay();

                if($nextPostBumpedAt <= $now){
                        
                    $post->bumped_at = $now;

                    $post->save();

                    // Promotion is successfull.

                    $this->info('Ad (id:id:'.$transaction->post_id.') of the User (id:'.$transaction->user_id.') is promoted as Bump-Ad on '.$now.'.');
                }

            });

        } catch (\Throwable $th) {
            // Return error.

            $this->error('`Bump Ad` Promotion Error: '. $th->getMessage());
        }
    }
}
