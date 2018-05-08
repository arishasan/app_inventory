<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
   
	static function updateBarang($input){

		date_default_timezone_set('Asia/Jakarta');

		$query = DB::table('tm_barang_inventaris')
		->where('br_kode',$input['kd_brg'])
		->update([
			'jns_brg_kode' => $input['jns_brg'],
			'user_id' => Auth::id(),
			'br_nama' => $input['nm_brg'],
			'br_tgl_entry' => date('Y-m-d H:i:s'),
			'br_status' => $input['status_brg']
		]);

		if($query) return true;else return false;

	}

	static function deleteBarang($input){
		date_default_timezone_set('Asia/Jakarta');

		$query = DB::table('tm_barang_inventaris')
		->where('br_kode',$input['kd_brg'])
		->update([
			'br_status' => '0'
		]);

		if($query) return true;else return false;
	}

	static function create($input){
		date_default_timezone_set('Asia/Jakarta');

		$query = DB::table('tm_barang_inventaris')
		->insert([
			'br_kode' => \App\barangModel::getNoOtomatis(),
			'jns_brg_kode' => $input['jns_brg'],
			'user_id' => '1',
			'br_nama' => $input['nm_brg'],
			'br_tgl_terima' => date('Y-m-d'),
			'br_tgl_entry' => date('Y-m-d H:i:s'),
			'br_status' => $input['status_brg']
		]);

		if($query) return true;else return false;
	}

	static function getNoOtomatis(){
		date_default_timezone_set('Asia/Jakarta');
		$tahun = date('Y');

		$last = '';
    	$data = DB::table('tm_barang_inventaris')->select('br_kode')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$last = $value->br_kode;
    	}
        $lastNoBarang=$last;
        
        $lastNoUrut=substr($lastNoBarang,7,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNext='INV'.$tahun.sprintf('%03s',$nextNoUrut);
        
        return $nextNext;

	}

}
