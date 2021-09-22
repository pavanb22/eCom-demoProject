<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class generateUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:generate-users {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user data and insert into database';

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
        $user_data = $this->argument('count');

        for ($i = 0; $i < $user_data; $i++) { 
            User::factory()->create();
        } 
    }
}
