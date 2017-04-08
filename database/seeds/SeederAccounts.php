<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()
        ]);
	    DB::table('users')->insert([
            'id' => str_replace('-', '', Uuid::generate(3, 'FrenChQWerTy', Uuid::NS_DNS)),
            'username' => "FrenChQWerTy",
            'email' => 'frenchqwerty@gmail.com',
            'password' => Hash::make('secret'),
            'name' => "ArabeSauvage",
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'id' => str_replace('-', '', Uuid::generate(3, 'Wirk', Uuid::NS_DNS)),
            'username' => "Wirk",
            'email' => 'contact@wirk.fr',
            'password' => Hash::make('secret'),
            'name' => "Saber",
            'confirmed' => true,
            'created_at' => Carbon::now()
        ]);
    }
}
