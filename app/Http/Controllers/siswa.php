<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siswa extends Controller
{
    public function index(){
    	$data['result'] = \App\modelShow::getDataSiswa();
    	return view('interface/siswa')->with($data);
    }

    public function method(Request $request){

    	$input = $request->all();

	    	if(isset($input['btnAdd'])){
	    		$rules = [
	    		'namaSiswa' => 'required'
	    	];

	    	$this->validate($request,$rules);
	    	
    		$doInsert = \App\m_inventory::inputSiswa($input);

	    	if($doInsert) return redirect('dataSiswa')->with('success','Add Siswa Berhasil');
	        else return redirect('dataSiswa')->with('error','Add Siswa Gagal');
    	}elseif(isset($input['btnEdit'])){
    		$doUpdate = \App\m_inventory::updateSiswa($input);

	    	if($doUpdate) return redirect('dataSiswa')->with('success','Update Siswa Berhasil');
	        else return redirect('dataSiswa')->with('error','Update Siswa Gagal');
    	}elseif(isset($input['btnDelete'])){
    		$doDelete = \App\m_inventory::deleteSiswa($input);

	    	if($doDelete) return redirect('dataSiswa')->with('success','Delete Siswa Berhasil');
	        else return redirect('dataSiswa')->with('error','Delete Siswa Gagal');
    	}

    }

}
