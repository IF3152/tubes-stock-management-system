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

        //No Categories
        $p2 = \App\Kategori::firstOrCreate(['nama' => 'Tidak Ada Kategori',]);
        $p3 = \App\Merek::firstOrCreate(['nama' => 'Tidak Ada Merek',]);
        $p4 = \App\Supplier::firstOrCreate(['nama' => 'Tidak Ada Supplier',]);
    }
}
