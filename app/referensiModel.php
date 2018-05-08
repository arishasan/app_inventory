<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class referensiModel extends Model
{
    static function addJenis($input){
    	$query = DB::table('tr_jenis_barang')
    	->insert([
    		'jns_brg_kode' => \App\referensiModel::getNoOtomatisJenis(),
    		'jns_brg_nama' => $input['jenis_nm']
    	]);

    	if($query) return true; else false;
    }

    static function addUser($input){
    	date_default_timezone_set('Asia/Jakarta');
    	$query = DB::table('tm_user')
    	->insert([
    		'user_nama' => $input['uname'],
    		'user_pass' => bcrypt($input['pswd']),
    		'user_hak' => $input['jenis_nm'],
    		'user_sts' => '1',
    		'updated_at' => date('Y-m-d H:i:s'),
    		'created_at' => date('Y-m-d H:i:s'),
    		'remember_token' => ''
    	]);

    	if($query) return true; else false;
    }

    static function editUser($input){
    	date_default_timezone_set('Asia/Jakarta');
    	
    	if($input['pswd'] == ''){
    		$query = DB::table('tm_user')
	    	->where('user_id',$input['user_id'])
	    	->update([
	    		'user_nama' => $input['uname'],
	    		'user_hak' => $input['jenis_nm'],
	    		'user_sts' => '1',
	    		'updated_at' => date('Y-m-d H:i:s'),
	    		'remember_token' => ''
	    	]);
    	}else{
    		$query = DB::table('tm_user')
	    	->where('user_id',$input['user_id'])
	    	->update([
	    		'user_nama' => $input['uname'],
	    		'user_pass' => bcrypt($input['pswd']),
	    		'user_hak' => $input['jenis_nm'],
	    		'user_sts' => '1',
	    		'updated_at' => date('Y-m-d H:i:s'),
	    		'remember_token' => ''
	    	]);
    	}

    	if($query) return true; else false;
    }

    static function deleteUser($input){
    	$query = DB::table('tm_user')
	    	->where('user_id',$input['user_id'])
	    	->delete();

	    if($query) return true; else false;
    }

    static function editJenis($input){
    	$query = DB::table('tr_jenis_barang')
    	->where('jns_brg_kode',$input['jenis_kd'])
    	->update([
    		'jns_brg_nama' => $input['jenis_nm']
    	]);

    	if($query) return true; else false;
    }

    static function deleteJenis($input){
    	$query = DB::table('tr_jenis_barang')
        ->where('jns_brg_kode',$input['jenis_kd'])
        ->delete();

        if($query) return true; else return false;
    }

    static function getNoOtomatisJenis(){

		date_default_timezone_set('Asia/Jakarta');

		$last = '';
    	$data = DB::table('tr_jenis_barang')->select('jns_brg_kode')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$last = $value->jns_brg_kode;
    	}
        $lastJenis=$last;
        
        $lastNoUrut=substr($lastJenis,1,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNext='J'.sprintf('%03s',$nextNoUrut);
        
        return $nextNext;

	
    }

}
