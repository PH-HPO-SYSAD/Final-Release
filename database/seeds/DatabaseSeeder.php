<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        App\User::create([
            'name' => 'Rosemale-John',
            'username' => 'rosemalejohn',
            'password' => Hash::make('rosemalejohn'),
            'account_type' => 'admin'
        ]);

        Model::reguard();
    }
}
