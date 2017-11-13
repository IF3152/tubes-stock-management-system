<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cabang;
use App\User;

class UserRole extends Model
{
    protected $table = "users_roles";
    protected $primaryKey =  'id'; // to declare a primary key
    protected $fillable = [
        'id',
        'user_id', 
        'cabang_id', 
        'ditetapkan_oleh',
    ];
    
    // Mencari cabang object pada pivot table untuk user yang dimaksud
    public function cabang($user){
        $userrole = UserRole::where('user_id', $user->id);
        
        $cabang = null;
        if ($userrole->exists()){    
            $userrole_first = $userrole->first();
            $userrole_cabang_id = $userrole_first->cabang_id;
            $cabang = Cabang::where('id', $userrole_cabang_id)->first();
        }
        return $cabang;
    }
    
}
