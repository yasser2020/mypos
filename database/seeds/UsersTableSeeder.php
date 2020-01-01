<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user=User::create([
            'first_name'=>'super',
            'last_name'=>'admin',
            'email'=>'super_admin@app.com',
            'password'=>bcrypt('12345'),

        ]);
        
        $user->attachRole('super_admin');
    }//end of run
}
