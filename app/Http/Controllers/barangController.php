<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class barangController extends Controller
{
    
    public function index(){
        $data['list'] = \App\modelShow::pureBarang();
        $data['jns'] = \App\modelShow::listJenisBarang();
    	return view('barang/index')->with($data);
    }


    public function create(){
        $data['jns'] = \App\modelShow::listJenisBarang();
    	return view('barang/form')->with($data);
    }

    public function methodUpdate(Request $request){

        $rules = [
            'kd_brg' => 'required',
            'nm_brg' => 'required',
            'jns_brg' => 'required',
            'status_brg' => 'required',
        ];

        $this->validate($request,$rules);

        $input = $request->all();
        $doUpdateBarang = \App\barangModel::updateBarang($input);

        if($doUpdateBarang) return redirect('barang/daftar')->with('success','Update barang sukses');
        else return redirect('barang/daftar')->with('error','Update barang gagal');
    }

    public function methodDelete(Request $request){
        $rules = [
            'kd_brg' => 'required'
        ];

        $this->validate($request,$rules);

        $input = $request->all();
        $doDeleteBarang = \App\barangModel::deleteBarang($input);

        if($doDeleteBarang) return redirect('barang/daftar')->with('success','Delete barang sukses');
        else return redirect('barang/daftar')->with('error','Delete barang gagal');
    }

    public function store(Request $request){

    	$rules = [
    		'nm_brg' => 'required',
    		'jns_brg' => 'required',
    		'status_brg' => 'required'
    	];

    	$this->validate($request, $rules);

    	$input = $request->all();
    	$status = \App\barangModel::create($input);

    	if($status) return redirect('barang/terima')->with('success','Data Berhasil Di Tambahkan');
    	else return redirect('barang/terima')->with('error','Data Gagal Di Tambahkan');
    	
    }

}
