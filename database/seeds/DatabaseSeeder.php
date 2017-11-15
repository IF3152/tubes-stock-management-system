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
        $p2 = \App\User::firstOrCreate(['name' => 'condro', 'email'=>'condro@outlook.co.id','password' => bcrypt('condrocondro')]);
        $p3 = \App\Cabang::firstOrCreate(['nama' => 'Cisitu', 'alamat'=>'Cisitu','telp' => '08912321']);


        //No Categories
        $p4 = \App\Kategori::firstOrCreate(['nama' => 'Tidak Ada Kategori',]);
        $p5 = \App\Merek::firstOrCreate(['nama' => 'Tidak Ada Merek',]);
        $p6 = \App\Supplier::firstOrCreate(['nama' => 'Tidak Ada Supplier',]);
    }
}
