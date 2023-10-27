<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => 'password',
        ]);

        Post::create([
            'title' => 'Test Title 1',
            'content' => 'just some content....',
            'user_id' => '1',
            'bumped_at' => now(),
        ]);

        Post::create([
            'title' => 'Test Title 2',
            'content' => 'just some content....',
            'user_id' => '1',
            'bumped_at' => now(),
        ]);

        Transaction::create([
            'payment_type' => 'ad-promotion',
            'user_id' => '1',
            'post_id' => '1',
            'amount' => '500',
            'description' => 'Test transaction',
            'payment_status' => 'success',
            'payment_started_datetime' => Carbon::now()->settings(['monthOverflow' => false])->subDays(4),
            'payment_valid_untill_datetime' => Carbon::now()->settings(['monthOverflow' => false])->subDays(1),
            'payment_due_datetime' => Carbon::now()->settings(['monthOverflow' => false])->addDays(10),
            'active' => 1,
        ]);

        Transaction::create([
            'payment_type' => 'ad-promotion',
            'user_id' => '1',
            'post_id' => '2',
            'amount' => '500',
            'description' => 'Test transaction',
            'payment_status' => 'success',
            'payment_started_datetime' => Carbon::now()->settings(['monthOverflow' => false])->subDays(7),
            'payment_valid_untill_datetime' => Carbon::now()->settings(['monthOverflow' => false])->subDays(2),
            'payment_due_datetime' => Carbon::now()->settings(['monthOverflow' => false])->addDays(10),
            'active' => 1,
        ]);
    }
}
