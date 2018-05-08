<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class loginnedUser extends Model
{
    static function getLoginData($id){
    	$query = DB::table('tm_user')
    	->select('*')
    	->whereRaw('user_id = "'.$id.'"')
    	->limit('1')
    	->get();

    	return $query->toArray();
    }

    static function cekPasswordLama($id){
    	$query = DB::table('tm_user')
    	->select('*')
    	->where('user_id',$id)
    	->limit('1')
    	->get();

    	return $query->toArray();
    }

    static function changePassword($input,$id){
    	$query = DB::table('tm_user')
    	->where('user_id',$id)
    	->update([
    		'user_pass' => bcrypt($input['passwordBaru'])
    	]);

    	if($query) return true; else return false;
    }

}
