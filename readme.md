Tubes IF3152 - Kelompok 6!
===================

deploy at : <a href="https://if3152.herokuapp.com/">if3152.herokuapp.com<a>
# Tubes IF3152

Pada dokumen ini akan dijelaskan langkah pengerjaan Tubes RPL Kelompok 6.

Human
-------------------
 1. Condro
 2. Bimasakti
 3. Irfan
 4. Tessa
 5. WIlliam
 6. List item
 7. Shafwan

##  Struktur dan Deskripsi Modul
Modul - modul
### 1. **User dan Password** 
 #### Table User
| Field | Type |
|--|--|
| id  | increment  |
| name  | string  |
| email  | string  |
| password  | string  |
| isAdmin | integer (0..1)  |

>Note : Modul ini tidak perlu dibuat karena sudah diimplementasikan secara otomatis oleh laravel dengan perintah
````
 php artisan make:auth
````
### 2. **Barang** ( Sub modul : Barang, Merek, Kategori, Supplier, Stok ). 
>Note : untuk barang ada sedikit perubahan struktur database
 #### Table Barang
| Field | Type |
|--|--|
| id  | increment  |
| nama  | string  |
| kategori_id  | integer (belongTo Kategori.id)  |
| merek_id  | integer  (belongTo Merek.id)|
| supplier_id  | integer (belongTo Supplier.id) |
| berat  | double  |
| deskripsi  | string  |
| sku | string  |
| harga  | double  |
| stok  | integer (default:0)  |

 #### Table Kategori
| Field | Type |
|--|--|
| id  | increment  |
| nama  | string  |
 #### Table Merek
| Field | Type |
|--|--|
| id  | increment  |
| nama  | string  |
 #### Table Supplier
| Field | Type |
|--|--|
| id  | increment  |
| nama  | string  |
| alamat  | string  |
| telp  | string  |
 #### Table Stok
| Field | Type |
|--|--|
| id  | increment  |
| barang_id  | unsigned integer foreign key on barang(id) cascade on delete  |
| stok_masuk  | integer  |
| stok_keluar  | integer  |
| admin_id | integer (belongTo user.id)  |
| deskripsi  | integer  |
### 3. Cabang ( termasuk relasi user dan cabang )
 #### Table Cabang
| Field | Type |
|--|--|
| id  | increment  |
| nama  | string  |
| alamat  | string  |
| telp  | string  |
 #### Table User Role ( User manajer dari Cabang)
| Field | Type |
|--|--|
| id  | increment  |
| user_id  | unsigned integer foreign key on user(id) cascade on delete  |
| cabang_id  | unsigned integer foreign key on cabang(id) cascade on delete  |
| ditetapkan_oleh  | integer (belongTo user.id)  |

 ### 4. Pemesanan
 #### Table Pemesanan
| Field | Type |
|--|--|
| id  | increment  |
| cabang_id  |  integer belongTo cabang.id  |
| kode_pemesanan | string  |
|harga| double |
|status| integer (-1, 0, 1) |
>Note : status **-1: batal**, **0:proses**, **1:suskses**
 
 ### 5. Detail Pemesanan 
 #### Table Detail Pemesanan
| Field | Type |
|--|--|
| id  | increment  |
| pemesanan_id  |  integer belongTo pemesanan.id  |
| barang_id | integer belongTo barang.id  |
| harga_satuan | double |
| qty | integer |
| harga_total | double |
 ### 7. Modul Notifikasi dan Emailing 
Menggunakan webpush referensi di https://github.com/laravel-notification-channels/webpush
 ### 8. Modul  Dashboard 

# Membangun Sistem
## Glosary
Hal - hal dasar tentang laravel
1. **Laravel**, framework PHP https://laravel.com/. Kenapa framework biar lebih indah dan rapi
2. **Migration** adalah  fitur yang digunakan untuk keperluan membuat tabel database di laravel. File migration ada di direktori **database/migration**
>1. **php artisan make:migration NAMA_MIGRATION**. Membuat migration baru
>2. **php artisan migrate**. Untuk mengeksekusi perintah dari file file migration yaitu membuat tabel atau kolom tertentu dalam database. Langkah ini dilakukan setelah langkah 2.1 diatas
3. **Model** adalah representasi sebauh field dari table. File model diletakkan di **app** 
>1. **php artisan make:model NAMA_MODEL** untuk membuat sebuah model. Model dalam laravel dapat diartikan sebagai representasi dari _field_ sebuah _table_   
4. **Controller** adalah Kontroler. File Controller berada di direktori **app/http/controllers**
>1. **php artisan make:controller NAMA_CONTROLLER** membuat sebuah kontroler kosong atau **php artisan make:controller NAMA_CONTROLLER --resource** untuk membuat kontroler yang sudah diberi template untuk keperluan CRUD.
5. **Route**, adalah penanganan untuk setiap url dengan controler yang tepat. File route ada di folder **route/web.php**
6. **View** adalah bagian yang berhubungan dengan antar muka. Direktori view ada di **resource/views**.

Sekiranya itu yang akan digunakan untuk pembangunan sistem ini. Jika error silakan tanya, atau googling juga lumayan banyak forum laravel.

## Prasyarat
- Knowledge of MVC (Model view controller)
- Install software berikut :
>- Apache and PHP Client, the easy ways use XAMPP <a href="https://www.apachefriends.org/download.html">here</a> choose the PHP 7.0 or later.
>Jika sudah install XAMPP tapi php masih 5.6, diharapkan untuk uninstall dan install kembali untuk XAMPP dengan PHP 7.0
>- Composer, get it <a href="https://getcomposer.org/" >here</a>
> - Git, <a href="https://git-scm.com/download/win"> here </a>

**Pastikan Program Program tersebut berjalan:**

> - Jalankan XAMPP ( Apache dan MySQL )
> - Cek Composer melalui cmd, dengan perintah 
> ````
> composer
> ````
> - Cek Git melalui cmd, dengan perintah
> ````
> git
> ````

# Langkah-langkah
## Persiapan Awal (only for the first-timer)
Lakukan langkah-langkah berikut melalui cmd
 1. Clone the git 
>````
>git clone https://github.com/IF3152/tubes-stock-management-system.git
>````
 2. Pindah ke folder tubes-stock-management-system
>````
> cd tubes-stock-management-system
>````
 3. Buat file .env dengan cara mengkopi file .env.example
>````
> copy .env.example .env
>````
 4. Instal aplikasi dengan composer
>````
>composer install
>````
 5. Generate APP_KEY dengan perintah
>````
> php artisan key:generate
>````
 6. Buat database baru di alamat <a href="http://localhost/phpmyadmin">localhost/phpmyadmin</a> 
 7. Buka editor kesayangan Anda (disarankan menggunakan Sublime, Atom, Geany, Notepad++)
 8. Buka folder dari di Editor, arahkan ke folder tadi
 9. Edit bagian DB berikut dari file .env
>````
>DB_CONNECTION=mysql
>DB_HOST=127.0.0.1
>DB_PORT=3306
>DB_DATABASE="NAMA_DATABASE KALIAN (dibuat dilangkah 6)"
>DB_USERNAME="USERNAME_MYSQL_KALIAN"
>DB_PASSWORD="PASSWORD_MYSQL_KALIAN"
>```` 
 10. Update database dari yang sudah ada dengan perintah. Perintah ini akan membuat tabel-tabel baru di mySQL kalian dan akan menambahkan beberapa record baru di database kalian. bisa di cek melalui phpmyadmin 
>````
>php artisan migrate
>php artisan db:seed
>````
 11. Sajikan website secara lokal dengan perintah
 >````
 >php artisan serve
 >````


## Mulai ngodingnya
### Pull dulu dari git
1. Buka cmd, dan arahkan ke folder kerja kita
````
git pull
````
2. Jalankan migrasi
````
php artisan migrate
````

### Membuat CRUD untuk Kategori ( dalam Modul Barang )
1.  Buka Windows Explorer. Masuk ke direktori kita misalnya di simpan di drive D, masuk ke
>````
>D:\tubes-stock-management-system
>````
2. Klik kanan dan tekan tombol <kbd>Shift</kbd>  pada area yang kosong, dan pilih **Open command Promt here**. Anda akan masuk di cmd
3. Buat file migration baru
>````
>php artisan make:migration create_kategori 
>````
4. Edit file migration tersebut di **database/migration/------create_kategori.php**. 
Edit pada bagian berikut ini untuk menentukan field tabel
````php
		public function up()
    	{
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nama',155)->nullable();
        });
````
dan ini untuk menghapus 
````php
    public function down()
    {
        //menghapus tabel barang
        Schema::dropIfExists('kategori');
    }
 ````
 5. kembali ke cmd dan jalankan perintah berikut ini. Akan ada tabel baru di database ( bisa dilihat di phpmyadmin)
 >````
 >php artisan migrate
 >````
 6. Masih di cmd buat **model** baru untuk tabel **barang**
 >````
 >php artisan make:model Kategori
 >````
  7. Edit file model anda **app/Kategori.php** pada bagian berikut
  ````php
  class Kategori extends Model
{
	protected $table = 'kategori';
	protected $primaryKey = 'id';
	protected $fillable = ['id','nama'];
}
````
 8. Buat kontroler dengan cara mengetik perintah berikut di cmd
 ````
 php artisan make:controller Kategori
 ````
 9. Edit file kontroler di **app/http/controllers/Kategori.php** pada bagian berikut.
  ````php
  class Kategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Kategori::all();
        
        return view('admin.kategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);
        
        $tambah = new \App\Kategori();
        $tambah->nama =  $request['nama'];
        $tambah->save();

        return redirect()->route('kategori.index')->with('pesan','Berhasil membuat baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Kategori::findOrFail($id);
                
        return view('admin.kategori.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = \App\Kategori::findOrFail($id);
                
        return view('admin.kategori.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $edit = \App\Kategori::findOrFail($id);
        $edit->nama =  $request['nama'];
        $edit->save();

        return redirect()->route('kategori.index')->with('pesan','Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = \App\Kategori::findOrFail($id);
        $delete->delete();
        return redirect()->route('kategori.index')->with('pesan','Berhasil dihapus');
    }
}
````
10 . Edit file route di **route/web.php** pada bagian berikut tambahkan
````php
Route::group(['prefix' => 'admin', 'middleware' => ['admin'] ], function(){
	Route::get('/', function () {
    	return view('admin.index');
	});
    //tambahkan disini 	
	Route::resource('kategori','Kategori');
	
});
````  
 11. Berurusan dengan views. Masuk ke folder **resources/views/admin** buat direktori baru dengan nama **kategori** masuk folder kategori (**resources/views/admin/kategori**). Buat 4 buah file disini dengan nama **index.blade.php**, **create.blade.php** , **edit.blade.php**, **show.blade.php**
 12. Buka file **resource/views/admin/kategori/index.blade.php** edit begini
 ````html
 @extends('layouts.app')
@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li class="active">kategori </li>
</ol>

    <div class="row">
        <div class="col-md-12">
                <a href="{{route('kategori.create')}}" class="btn btn-success pull-right"> BUAT BARU</a>
                <div class="">
                    <div class="table">
                    <table class="table table-striped responsive" id="contoh" data-form="deleteForm">
                    <thead>
                    <tr>
                        <td style="max-width: 10px">ID</td>
                        <td>Nama</td>
                        <td width="20%">Edit</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->id}} </td>
                        <td>{{$data->nama}} </td>
                       	<td>
                            <a href="{{route('kategori.show', $data->id)}}" class="btn btn-xs btn-primary"><span class="fa fa-eye"></span></a>
                            <a href="{{route('kategori.edit', $data->id)}}" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span></a>
                            <form id="destroy{{$data->id}}" method="POST" action="{{ route('kategori.destroy', $data->id) }}" accept-charset="UTF-8" class="form-delete" style="display: inline-block;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                           
                            <button type="submit" class="btn btn-xs btn-danger" name="delete-modal" > <span class="fa fa-trash-o"> </button>
                            </form>
                       	</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
                <p></p>
                <ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')

<script type="text/javascript">
    //MENAMPILKAN PESAN
    @if (session()->has('pesan'))
    alertify.success("{{ (string)Session::get('pesan') }}");
    @endif
</script>

<script type="text/javascript">
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});
</script>
@endsection
 ````
  13. Buka file **resource/views/admin/kategori/create.blade.php** edit begini
````html
@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/kategori">kategori</a> </li>
    <li class="active">Buat Baru </li>
</ol>

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form class="form-horizontal" role="form" method="POST" action="{{ route('kategori.store') }}">
                {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nama" class="col-md-4 control-label">Nama *</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>  
        </div>
    </div>
</div>
@endsection 
````
  14.  Buka file **resource/views/admin/kategori/edit.blade.php** edit begini
````html
@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Manajemen</a></li>
    <li><a href="/admin/kategori">kategori</a> </li>
    <li class="active">Edit</li>
</ol>

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form class="form-horizontal" role="form" method="POST" action="{{ route('kategori.update', $data->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group">
                            <label for="nama" class="col-md-4 control-label">Nama *</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>
                            </div>
                        </div>
                </form>  
        </div>
    </div>
</div>
@endsection
````
15. Buka file **resource/views/admin/kategori/show.blade.php** edit begini
```html
@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/kategori">kategori</a> </li>
    <li class="active">{{$data->nama}} </li>
</ol>
<a title='Return'  href="{{route('kategori.index')}}" ><i class='fa fa-chevron-circle-left '></i> &nbsp; Kembali ke Kategori</a>

    <div class="row">
        <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading">Category : {{$data->nama}}</div>

                <div class="panel-body">
                    <table width="100%">
                        <tr>
                            <td width="40%"><strong>nama</strong></td>
                            <td>{{$data->nama}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```
16. Selesai.
17. Silakan test dengan run aplikasi melalui perintah di cmd
````
php artisan serve
````
18. Buka browser ketik alamat http://localhost:8000

## Akhir : Menyimpan di Git
Jika sudah selesai simpan kode di github dengan cara
1. Stage file anda
````
git add .
````
2. Commit perubahan
````
git commit -m 'PESAN KOMIT ANDA'
````
3. Push
````
git push -u origin master
````
## Selesai
Selamat Bekerja !!!!

### Created with ❤ with Laravel and Heroku from STI15