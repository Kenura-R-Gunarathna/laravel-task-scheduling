<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transaction;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
        Transaction::where('payment_type', 'ad-promotion')
                    ->where('payment_status', 'success')
                    ->whereNotNull('payment_started_datetime')
                    ->whereNotNull('payment_valid_untill_datetime')
                    ->whereNotNull('payment_due_datetime')
                    ->where('active', 1)
                    ->where('payment_valid_untill_datetime', '<=', now())
                    ->with('post')
                    ->lazyById()->each(function (object $transaction) {

            $post = Post::find($transaction->id);

            $postBumpedAt = $post->bumped_at;

            $post->bumped_at = now();

            $post->save();

        });
        

});
