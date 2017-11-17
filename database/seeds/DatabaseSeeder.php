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
        $admin1 = \App\User::firstOrCreate(['name' => 'admin', 'email'=>'admin@admin.com','password' => bcrypt('adminadmin'), 'isAdmin' =>1 ]);
        $admin2 = \App\User::firstOrCreate(['name' => 'Tubes RPL', 'email'=>'18215042@std.stei.itb.ac.id','password' => bcrypt('tubestubes'), 'isAdmin' =>1 ]);

        $user1 = \App\User::firstOrCreate(['name' => 'user 1', 'email'=>'user1@user.com','password' => bcrypt('useruser')]); 
        $user2 = \App\User::firstOrCreate(['name' => 'user 2', 'email'=>'user2@user.com','password' => bcrypt('useruser')]); 
        $user3 = \App\User::firstOrCreate(['name' => 'user 3', 'email'=>'user3@user.com','password' => bcrypt('useruser')]); 
        $user4 = \App\User::firstOrCreate(['name' => 'user 4', 'email'=>'user4@user.com','password' => bcrypt('useruser')]); 
        $user5 = \App\User::firstOrCreate(['name' => 'user 5', 'email'=>'user5@user.com','password' => bcrypt('useruser')]); 
        $user6 = \App\User::firstOrCreate(['name' => 'condro', 'email'=>'condro@outlook.co.id','password' => bcrypt('condrocondro')]);


        $cabang1 = \App\Cabang::firstOrCreate(['nama' => 'Cisitu Echo', 'alamat'=>'Cisitu','telp' => '08912321']);
        $cabang2 = \App\Cabang::firstOrCreate(['nama' => 'Tubis Lezate', 'alamat'=>'Tubis','telp' => '08912321']);
        $cabang3 = \App\Cabang::firstOrCreate(['nama' => 'Dago Enak Tenan', 'alamat'=>'Dago','telp' => '08912321']);
        $cabang4 = \App\Cabang::firstOrCreate(['nama' => 'Fast Foot Tubis ', 'alamat'=>'Tubis','telp' => '08912321']);
        $cabang5 = \App\Cabang::firstOrCreate(['nama' => 'Dipati Ukur Space', 'alamat'=>'Dipati Ukur','telp' => '08912321']);
        $cabang6 = \App\Cabang::firstOrCreate(['nama' => 'ITB Jam', 'alamat'=>'ITB','telp' => '08912321']);
        $cabang7 = \App\Cabang::firstOrCreate(['nama' => 'Pizza Warung', 'alamat'=>'Tubis','telp' => '08912321']);
        $cabang8 = \App\Cabang::firstOrCreate(['nama' => 'Kaki Lima Dewa', 'alamat'=>'Dago','telp' => '08912321']);
        $cabang9 = \App\Cabang::firstOrCreate(['nama' => 'ITB Warung Bakso', 'alamat'=>'ITB','telp' => '08912321']);
        $cabang10 = \App\Cabang::firstOrCreate(['nama' => 'Tubis Warung Echo', 'alamat'=>'Tubis','telp' => '08912321']);

        //UserCabang
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 1 ,'user_id' => 1,'ditetapkan_oleh' => 1 ]);
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 2 ,'user_id' => 2,'ditetapkan_oleh' => 1]);
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 3 ,'user_id' => 3,'ditetapkan_oleh' => 1]);
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 4 ,'user_id' => 4,'ditetapkan_oleh' => 1]);
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 5 ,'user_id' => 5,'ditetapkan_oleh' => 1]);
        $usercabang = \App\UserRole::firstOrCreate(['cabang_id' => 6 ,'user_id' => 6,'ditetapkan_oleh' => 1]);

        //No Categories
        $kategori1 = \App\Kategori::firstOrCreate(['nama' => 'Tidak Ada Kategori',]);
        $kategori2 = \App\Kategori::firstOrCreate(['nama' => 'Sayuran',]);
        $kategori3 = \App\Kategori::firstOrCreate(['nama' => 'Minuman',]);
        $kategori4 = \App\Kategori::firstOrCreate(['nama' => 'Daging',]);
        $kategori5 = \App\Kategori::firstOrCreate(['nama' => 'Kategori 5',]);
        $kategori6 = \App\Kategori::firstOrCreate(['nama' => 'Kategori 6',]);


        $merek1 = \App\Merek::firstOrCreate(['nama' => 'Tidak Ada Merek',]);
        $merek2 = \App\Merek::firstOrCreate(['nama' => 'Sonia',]);
        $merek3 = \App\Merek::firstOrCreate(['nama' => 'Merek3',]);
        $merek4 = \App\Merek::firstOrCreate(['nama' => 'Merek4',]);
        $merek5 = \App\Merek::firstOrCreate(['nama' => 'Merek5',]);


        $supplier1 = \App\Supplier::firstOrCreate(['nama' => 'Tidak Ada Supplier',]);
        $supplier2 = \App\Supplier::firstOrCreate(['nama' => 'Supplier A',]);
        $supplier3 = \App\Supplier::firstOrCreate(['nama' => 'Supplier B',]);
        $supplier4 = \App\Supplier::firstOrCreate(['nama' => 'Supplier C',]);
        $supplier5 = \App\Supplier::firstOrCreate(['nama' => 'Supplier D',]);
        $supplier6 = \App\Supplier::firstOrCreate(['nama' => 'Supplier E',]);
        $supplier7 = \App\Supplier::firstOrCreate(['nama' => 'Supplier F',]);


        $barang1 = \App\Barang::firstOrCreate([ 
            'nama' => 'Barang 1', 
            'kategori_id' => 1,
            'merek_id' => 1,
            'supplier_id' => 1 , 
            'berat' => 500, 
            'deskripsi' => 'Deskripsi 1', 
            'sku' => 'ABSC', 
            'harga' => 45000,
            'stok' =>100]);



        $barang2 = \App\Barang::firstOrCreate([ 'nama' => 'Barang 2', 'kategori_id' => 3,'merek_id' => 1,'supplier_id' => 1 , 'berat' => 500, 'deskripsi' => 'Deskripsi 1', 'sku' => 'asdasd', 'harga' => 9000,'stok' =>100 ]);
        $barang3 = \App\Barang::firstOrCreate([ 'nama' => 'Barang 3', 'kategori_id' => 1,'merek_id' => 1,'supplier_id' => 3 , 'berat' => 500, 'deskripsi' => 'Deskripsi 1', 'sku' => 'ABSC', 'harga' => 1000,'stok' =>100 ]);
    }
}
