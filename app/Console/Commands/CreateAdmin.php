<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Bouncer;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Super Admin';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $user = User::create([
            'username' => $this->argument('username'),
            'password' => Hash::make($this->argument('password')),
        ]);


        /////////////// Admin

        $admin = Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrator Of Site',
        ]);

        $create = Bouncer::ability()->create([
            'name' => 'create-users',
            'title' => 'Create users',
        ]);

        $ban = Bouncer::ability()->create([
            'name' => 'ban-users',
            'title' => 'Create users',
        ]);

        Bouncer::allow($admin)->to($ban);

        Bouncer::allow($admin)->to($create);

        $user->assign('admin');
        
        ///////////////////////// Active


        $active = Bouncer::role()->create([
            'name' => 'active',
            'title' => 'Active Account',
        ]);


        $make_transaction = Bouncer::ability()->create([
            'name' => 'make-transaction',
            'title' => 'Can Make Trancaction',
        ]);

        Bouncer::allow($active)->to($make_transaction); 

        //////////////////////// Inactive

        $inactive = Bouncer::role()->create([
            'name' => 'inactive',
            'title' => 'Inactive Account',
        ]);

        $create_Account = Bouncer::ability()->create([
            'name' => 'create-account',
            'title' => 'Create create account',
        ]);

        Bouncer::allow($inactive)->to($create_Account);  


        

        ///////////////////////// Account Actions


        $banned = Bouncer::role()->create([
            'name' => 'banned',
            'title' => 'Banned Account',
        ]);

        Bouncer::forbid($banned)->everything(); 


        $limited = Bouncer::role()->create([
            'name' => 'limited',
            'title' => 'Limited Bank Account',
        ]);

        $blocked = Bouncer::role()->create([
            'name' => 'blocked',
            'title' => 'Blocked Bank Account',
        ]);

        $blocked = Bouncer::role()->create([
            'name' => 'login-disabled',
            'title' => 'Disable Login Access',
        ]);

        echo "All Roles Has Been Set And Super Admin Have Created";
    }
}
