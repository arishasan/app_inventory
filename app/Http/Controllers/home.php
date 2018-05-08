<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index(){
    	$data['rekordTransaksiPeminjaman'] = \App\modelShow::getRekordData();
    	$data['countPeminjaman'] = \App\modelShow::getCountData();
    	$data['entry'] = \App\modelShow::getEntryDataBarang();
    	return view('interface/home')->with($data);
    }

    public function ubahpassword(Request $request){
    	$rules = [
    		'passwordBaru' => 'required',
    		'cpasswordBaru' => 'required'
    	];

    	$this->validate($request,$rules);

    	$input = $request->all();

        if($input['passwordBaru'] == $input['cpasswordBaru']){
            $id = Auth::id();
            $cekFirst = \App\loginnedUser::cekPasswordLama($id);
            $ids = '';
            foreach ($cekFirst as $key => $value) {
                $ids = $value->user_id;
            }

            if($ids == Auth::id()){
                
                $change = \App\loginnedUser::changePassword($input,$ids);

                if($change) return redirect('/')->with('success','Password di ubah');
                else return redirect('/')->with('error','Password gagal di ubah');

            }else{
                return redirect('/')->with('error','User tidak ditemukan');
            }

        }else{
            return redirect('/')->with('error','Password baru dan konfirmasi tidak sama');
        }
    	

    }
}
