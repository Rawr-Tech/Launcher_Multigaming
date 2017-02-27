<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class SeederAccounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => str_replace('-', '', Uuid::generate(3, 'MrDarkSkil', Uuid::NS_DNS)),
            'username' => "MrDarkSkil",
            'email' => 'leohub@live.fr',
            'password' => Hash::make('secret'),
            'name' => "TEST",
        ]);
	    DB::table('users')->insert([
            'id' => str_replace('-', '', Uuid::generate(3, 'FrenChQWerTy', Uuid::NS_DNS)),
            'username' => "FrenChQWerTy",
            'email' => 'frenchqwerty@gmail.com',
            'password' => Hash::make('secret'),
            'name' => "ArabeSauvage"
        ]);
    }
}
