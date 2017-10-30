<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = \App\User::firstOrCreate(['name' => 'admin', 'email'=>'admin@admin.com','password' => bcrypt('adminadmin')]);
       	$p1->isAdmin = 1;
        $p1->save();
    }
}
