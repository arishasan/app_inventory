<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class referensiController extends Controller
{
    public function jenis_barang(){
    	$data['list'] = \App\modelShow::getListJenis();
    	return view('referensi/jenisBarang')->with($data);
    }

    public function add(Request $request){

    	$rules = [
    		'jenis_nm' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

    	$doAdd = \App\referensiModel::addJenis($input);

    	if($doAdd) return redirect('referensi/jenisBarang')->with('success','Menambahkan jenis barang sukses');
        else return redirect('referensi/jenisBarang')->with('error','Menambahkan jenis barang gagal');

    }

    public function addUser(Request $request){
    	$rules = [
    		'uname' => 'required',
    		'pswd' => 'required',
    		'jenis_nm' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

    	$doAddUser = \App\referensiModel::addUser($input);

    	if($doAddUser) return redirect('referensi/daftarPengguna')->with('success','Menambahkan user baru sukses');
        else return redirect('referensi/daftarPengguna')->with('error','Menambahkan user baru gagal');
    }

    public function editUser(Request $request){
    	$rules = [
    		'uname' => 'required',
    		'jenis_nm' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

    	if($input['user_id'] == AUTH::id()){
    		return redirect('referensi/daftarPengguna')->with('error','Tidak Bisa Mengedit akun yang sedang dipakai');
    	}else{
    		$doEditUser = \App\referensiModel::editUser($input);

	    	if($doEditUser) return redirect('referensi/daftarPengguna')->with('success','Edit user sukses');
	        else return redirect('referensi/daftarPengguna')->with('error','Edit user gagal');
    	}
    }

    public function deleteUser(Request $request){
    	$rules = [
    		'user_id' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

    	if($input['user_id'] == AUTH::id()){
    		return redirect('referensi/daftarPengguna')->with('error','Tidak Bisa Menghapus akun yang sedang dipakai');
    	}else{
    		$doEditUser = \App\referensiModel::deleteUser($input);

	    	if($doEditUser) return redirect('referensi/daftarPengguna')->with('success','Delete user sukses');
	        else return redirect('referensi/daftarPengguna')->with('error','Delete user gagal');
    	}

    }

    public function edit(Request $request){
    	$rules = [
    		'jenis_nm' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

    	$doUpd = \App\referensiModel::editJenis($input);

    	if($doUpd) return redirect('referensi/jenisBarang')->with('success','Update jenis barang sukses');
        else return redirect('referensi/jenisBarang')->with('error','Update jenis barang gagal');

    }

    public function delete(Request $request){
    	$input = $request->all();

    	$doDel = \App\referensiModel::deleteJenis($input);

    	if($doDel) return redirect('referensi/jenisBarang')->with('success','Delete jenis barang sukses');
        else return redirect('referensi/jenisBarang')->with('error','Delete jenis barang gagal');

    }

    public function pengguna(){
    	$data['list'] = \App\modelShow::getListPengguna();
    	return view('referensi/pengguna')->with($data);
    }
}
