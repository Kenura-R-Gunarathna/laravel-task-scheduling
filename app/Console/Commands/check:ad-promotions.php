<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
    }
}
