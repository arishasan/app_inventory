<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class m_inventory extends Model
{

    static function inputSiswa($input){
        $noOtomatisSiswa = \App\m_inventory::getNoOtomatisSiswa();

        $query = DB::table('tb_siswa')
        ->insert([
            'pb_no_siswa' => $noOtomatisSiswa,
            'pb_nama_siswa' => $input['namaSiswa']
        ]);

        if($query) return true; else return false;

    }

    static function updateSiswa($input){
        $query = DB::table('tb_siswa')
        ->where('pb_no_siswa',$input['noSiswa'])
        ->update([
            'pb_nama_siswa' => $input['namaSiswa']
        ]);

        if($query) return true; else return false;

    }

    static function deleteSiswa($input){
        $query = DB::table('tb_siswa')
        ->where('pb_no_siswa',$input['noSiswa'])
        ->delete();

        if($query) return true; else return false;
    }

    static function getNoOtomatisSiswa(){
        $last = '';
        $data = DB::table('tb_siswa')->select('pb_no_siswa')->get();
        $arr = $data->toArray();
        foreach ($arr as $key => $value) {
            $last = $value->pb_no_siswa;
        }
        $lastNoSiswa=$last;
        
        $lastNoUrut=substr($lastNoSiswa,1,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNoSiswa='S'.sprintf('%03s',$nextNoUrut);
        
        return $nextNoSiswa;
    }

    static function getNoOtomatis(){
    	$last = '';
    	$today=date('Ym');
    	$data = DB::table('tm_peminjaman')->select('pb_id')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$last = $value->pb_id;
    	}
        $lastNoUrutTransaksi=$last;
        
        $lastNoUrut=substr($lastNoUrutTransaksi,8,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNoTransaksi='PJ'.$today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }

    static function getKembaliNoOtomatis(){
        $last = '';
        $today=date('Ym');
        $data = DB::table('tm_pengembalian')->select('kembali_id')->get();
        $arr = $data->toArray();
        foreach ($arr as $key => $value) {
            $last = $value->kembali_id;
        }
        $lastNoUrutTransaksi=$last;
        
        $lastNoUrut=substr($lastNoUrutTransaksi,8,3);
        
        $nextNoUrut=$lastNoUrut+1;
        
        $nextNoTransaksi='KB'.$today.sprintf('%03s',$nextNoUrut);
        
        return $nextNoTransaksi;
    }

    static function getNoOtomatisDet($noOtomatis,$key){
        $pb_id = $noOtomatis;
        $lastNoUrut=substr($pb_id,11,3);
        $nextNoUrut=$lastNoUrut+$key+1;
        $nextNoTransaksi=$pb_id.sprintf('%03s',$nextNoUrut);

        return $nextNoTransaksi;
    }

    static function cekblack($id){
        $query = DB::table('tm_peminjaman')
        ->where('pb_id',$id)
        ->get();

        return $query->toArray();
    }

    static function simpanPengembalian($input){

        // SYSTEM CONS

        $cek = \App\m_inventory::cekblack($input['ID_pinjam']);

        foreach ($cek as $key => $value) {
            $isThere = substr($value->pb_harus_kembali_tgl, 0,10);
        }

        if($isThere < date('Y-m-d')){
            date_default_timezone_set('Asia/Jakarta');

            $noOtomatis = \App\m_inventory::getKembaliNoOtomatis();
            $pb_id = $input['ID_pinjam'];
            $user = Auth::id();
            $kembaliTgl = date('Y-m-d H:i:s');
            $kembali_sts = '1';

            $insert = DB::table('tm_pengembalian')
            ->insert(
                [
                    'kembali_id' => $noOtomatis,
                    'pb_id' => $pb_id,
                    'user_id' => $user,
                    'kembali_tgl' => $kembaliTgl,
                    'kembali_sts' => $kembali_sts
                ]                
            );     

            $upd = DB::table('tb_siswa')
            ->where('pb_no_siswa',$input['no_peminjam'])
            ->update([
                'status_peminjaman' => '0'
            ]);

            if($insert && $upd){
                return true;
            }else{
                return false;
            }
        }else{
            date_default_timezone_set('Asia/Jakarta');

            $noOtomatis = \App\m_inventory::getKembaliNoOtomatis();
            $pb_id = $input['ID_pinjam'];
            $user = Auth::id();
            $kembaliTgl = date('Y-m-d H:i:s');
            $kembali_sts = '1';

            $insert = DB::table('tm_pengembalian')
            ->insert(
                [
                    'kembali_id' => $noOtomatis,
                    'pb_id' => $pb_id,
                    'user_id' => $user,
                    'kembali_tgl' => $kembaliTgl,
                    'kembali_sts' => $kembali_sts
                ]                
            );             

            if($insert){
                return true;
            }else{
                return false;
            }
        }

    }

    static function blackList($id){
        $query = DB::table('tb_siswa')
        ->where('pb_no_siswa',$id)
        ->update([
            'status_peminjaman' => '0'
        ]);

        if($query) return true; else return false;
    }

    static function unblacklist($id){
        $query = DB::table('tb_siswa')
        ->where('pb_no_siswa',$id)
        ->update([
            'status_peminjaman' => '1'
        ]);

        if($query) return true; else return false;
    }

    static function updatePeminjaman1($input){
        date_default_timezone_set('Asia/Jakarta');

            $user = Auth::id();
            $tgl = date('Y-m-d H:i:s');
            $akhir = $input['tanggalAkhir']. ' ' .$input['jamAkhir'].':00';
            $siswa = $input['noSiswa'];

        $upd1 = DB::table('tm_peminjaman')
        ->where('pb_id',$input['idPinjam'])
        ->update([
            'user_id' => Auth::id()
        ]);

        $noOtomatis = $input['idPinjam'];

        $cek = DB::table('td_peminjaman_barang')
        ->where('pb_id',$input['idPinjam'])
        ->delete();

            if(isset($input['idBarang'])){
                foreach ($input['idBarang'] as $key => $value) {
                   $insertDet = DB::table('td_peminjaman_barang')
                    ->insert(
                        [
                            'pbd_id' => \App\m_inventory::getNoOtomatisDet($noOtomatis,$key),
                            'pb_id' => $noOtomatis,
                            'br_kode' => $value,
                            'pdb_tgl' => $tgl,
                            'pdb_sts' => '1'
                        ]
                    );
                }
                if($upd1 OR $insertDet){
                return true;
                }else{
                    return false;
                }
            }

            if(!isset($input['idBarang'])){

                if($upd1){
                return true;
                }else{
                    return false;
                }

            }else{

                if($upd1 OR $insertDet){
                return true;
                }else{
                    return false;
                }

            }


    }

    static function updatePeminjaman2($input){
        date_default_timezone_set('Asia/Jakarta');

            $user = Auth::id();
            $tgl = date('Y-m-d H:i:s');
            $akhir = $input['tanggalAkhir']. ' ' .$input['jamAkhir'].':00';
            $siswa = $input['noSiswa'];

        $upd1 = DB::table('tm_peminjaman')
        ->where('pb_id',$input['idPinjam'])
        ->update([
            'user_id' => Auth::id(),
            'pb_harus_kembali_tgl' => $akhir
        ]);

        $noOtomatis = $input['idPinjam'];

        $cek = DB::table('td_peminjaman_barang')
        ->where('pb_id',$input['idPinjam'])
        ->delete();

            if(isset($input['idBarang'])){
                foreach ($input['idBarang'] as $key => $value) {
                   $insertDet = DB::table('td_peminjaman_barang')
                    ->insert(
                        [
                            'pbd_id' => \App\m_inventory::getNoOtomatisDet($noOtomatis,$key),
                            'pb_id' => $noOtomatis,
                            'br_kode' => $value,
                            'pdb_tgl' => $tgl,
                            'pdb_sts' => '1'
                        ]
                    );
                }
            }

            if(!isset($input['idBarang'])){

                if($upd1){
                return true;
                }else{
                    return false;
                }

            }else{

                if($upd1 OR $insertDet){
                return true;
                }else{
                    return false;
                }

            }


    }

    static function simpanPeminjaman($input){

        // CHECKING FIRST

        $res = \App\modelShow::checkSiswaById($input['noSiswa']);

        if($res > 0){
            return false;
        }else{

            // System cons
            date_default_timezone_set('Asia/Jakarta');

            // Var and stored
            $noOtomatis = \App\m_inventory::getNoOtomatis();
            $user = Auth::id();
            $tgl = date('Y-m-d H:i:s');
            $akhir = $input['tanggalAkhir']. ' ' .$input['jamAkhir'].':00';
            $siswa = $input['noSiswa'];
            $status = '1';
            $statusPinjamDet = '1';
            // End of input Resource
           
            // Begin Input
            $insert = DB::table('tm_peminjaman')
                ->insert(
                    [
                        'pb_id' => $noOtomatis,
                        'user_id' => $user,
                        'pb_tgl' => $tgl,
                        'pb_no_siswa' => $siswa,
                        'pb_harus_kembali_tgl' => $akhir,
                        'pb_stat' => $status
                    ]
                );

            // Multiple Insert
            foreach ($input['idBarang'] as $key => $value) {
               $insertDet = DB::table('td_peminjaman_barang')
                ->insert(
                    [
                        'pbd_id' => \App\m_inventory::getNoOtomatisDet($noOtomatis,$key),
                        'pb_id' => $noOtomatis,
                        'br_kode' => $value,
                        'pdb_tgl' => $tgl,
                        'pdb_sts' => $statusPinjamDet
                    ]
                );
            }

            if($insert OR $insertDet){
                return $value = $noOtomatis;
            }else{
                return $value = '';
            }

        }

    }
}
