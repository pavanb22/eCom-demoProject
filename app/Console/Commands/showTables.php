<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class showTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:UserData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show List of Users';

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
       // $this->info(DB::connection()->select('SHOW TABLES'));
        $headers = [ 'id', 'name', 'email', 'password', 'created_at', 'updated_at' ];
        $users = User::all([ 'id', 'name', 'email', 'password', 'created_at', 'updated_at' ])->toArray();
        $this->table($headers, $users);
    }
}
