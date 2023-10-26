<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckMemberships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check:memberships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate expired memberships inside transactions and memberships.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
