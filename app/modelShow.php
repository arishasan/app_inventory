<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class modelShow extends Model
{
   		
   		static function showSiswa(){
   			// $query = DB::connection()->query('SELECT * from tb_siswa');
   			$query = DB::table('tb_siswa')->select('*')->whereRaw('status_peminjaman <> 0')->get();

   			return $query->toArray();
   		}

      static function getPeminjam($id){
        $query = DB::table('tm_peminjaman')
        ->selectRaw('tm_peminjaman.pb_id,tm_peminjaman.pb_no_siswa,tb_siswa.pb_nama_siswa,tm_peminjaman.pb_id,tm_peminjaman.pb_harus_kembali_tgl')
        ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
        ->where('pb_id',$id)
        ->get();

        return $query->toArray();
      }

      static function getBarangExistPeminjaman($id){
        $query = DB::table('tm_barang_inventaris')
        ->join('tr_jenis_barang', 'tm_barang_inventaris.jns_brg_kode', '=', 'tr_jenis_barang.jns_brg_kode')
        ->select('tm_barang_inventaris.br_kode','tm_barang_inventaris.jns_brg_kode','tm_barang_inventaris.br_nama','tm_barang_inventaris.br_status','tr_jenis_barang.jns_brg_nama')
        ->whereRaw('')
        ->get();

        return $query->toArray();
      }

      static function getListPengguna(){
        $query = DB::table('tm_user')->select('*')->get();

        return $query->toArray();
      }

      static function getListJenis(){
        $query = DB::table('tr_jenis_barang')->select('*')->get();

        return $query->toArray();
      }

      static function pureBarang(){
        $query = DB::table('tm_barang_inventaris')->selectRaw('tm_barang_inventaris.*,tr_jenis_barang.jns_brg_nama')->join('tr_jenis_barang','tr_jenis_barang.jns_brg_kode','=','tm_barang_inventaris.jns_brg_kode')->whereRaw('tm_barang_inventaris.br_status <> 0')->get();

        return $query->toArray();
      }

      static function listJenisBarang(){
        $query = DB::table('tr_jenis_barang')->select('*')->get();

        return $query->toArray();
      }

      static function getRekordData(){
        $query = DB::table('tm_peminjaman')
        ->selectRaw('substr(pb_tgl,1,10) as rekordTgl,count(substr(pb_tgl,1,10)) as recordPerHari')
        ->groupBy('rekordTgl')
        ->get();

        return $query->toArray();
      }

      static function getDataSiswa(){
        $query = DB::table('tb_siswa')
        ->select('*')
        ->get();

        return $query->toArray();
      }

      static function getCountData(){
        $query = DB::table('tm_peminjaman')
        ->selectRaw('count(pb_id) as jm')
        ->get();

        return $query->toArray();
      }

      static function getEntryDataBarang(){
        $query = DB::table('tm_barang_inventaris')
        ->selectRaw('count(br_kode) as jm')
        ->get();

        return $query->toArray();
      }

      static function showBelumKembali(){
        $query = DB::table('tm_barang_inventaris')
        ->join('tr_jenis_barang', 'tm_barang_inventaris.jns_brg_kode', '=', 'tr_jenis_barang.jns_brg_kode')
        ->select('tm_barang_inventaris.br_kode','tm_barang_inventaris.jns_brg_kode','tm_barang_inventaris.br_nama','tm_barang_inventaris.br_status','tr_jenis_barang.jns_brg_nama')
        ->where('tm_barang_inventaris.br_status','<>','0')
        ->where('tm_barang_inventaris.br_status','<>','3')
        ->whereRaw('tm_barang_inventaris.br_kode IN (SELECT td_peminjaman_barang.br_kode FROM td_peminjaman_barang WHERE td_peminjaman_barang.pdb_sts = 1)')
        ->get();

        return $query->toArray();
      }

   		static function showBarang(){
   			$query = DB::table('tm_barang_inventaris')
   			->join('tr_jenis_barang', 'tm_barang_inventaris.jns_brg_kode', '=', 'tr_jenis_barang.jns_brg_kode')
   			->select('tm_barang_inventaris.br_kode','tm_barang_inventaris.jns_brg_kode','tm_barang_inventaris.br_nama','tm_barang_inventaris.br_status','tr_jenis_barang.jns_brg_nama')
   			->where('tm_barang_inventaris.br_status','<>','0')
   			->where('tm_barang_inventaris.br_status','<>','3')
   			->whereRaw('tm_barang_inventaris.br_kode NOT IN (SELECT td_peminjaman_barang.br_kode FROM td_peminjaman_barang WHERE td_peminjaman_barang.pdb_sts = 1)')
   			->get();

   			return $query->toArray();
   		}

      static function showListPinjam(){
        date_default_timezone_set('Asia/Jakarta');
        $tglSekarang = date('Y-m-d');
        $query = DB::table('tm_peminjaman')
        ->selectRaw('tm_peminjaman.*,tb_siswa.pb_nama_siswa')
        ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
        ->where('tm_peminjaman.pb_stat','=','1')
        ->get();

        return $query->toArray();
      }

      static function showListPinjam3HariTerakhir($hari3){
        date_default_timezone_set('Asia/Jakarta');
        $tgl3 = $hari3;
        $query = DB::table('tm_peminjaman')
        ->selectRaw('tm_peminjaman.*,tb_siswa.pb_nama_siswa')
        ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
        ->where('tm_peminjaman.pb_stat','=','1')
        ->whereRaw('substr(tm_peminjaman.pb_harus_kembali_tgl,1,10) = "'.$hari3.'"')
        ->get();

        return $query->toArray();
      }

      static function showListPinjamHariTerakhir($hari1){
        date_default_timezone_set('Asia/Jakarta');
        $tgl1 = $hari1;
        $query = DB::table('tm_peminjaman')
        ->selectRaw('tm_peminjaman.*,tb_siswa.pb_nama_siswa')
        ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
        ->where('tm_peminjaman.pb_stat','=','1')
        ->whereRaw('substr(tm_peminjaman.pb_harus_kembali_tgl,1,10) = "'.$hari1.'"')
        ->get();

        return $query->toArray();
      }

      static function showListPinjamLebih($hari1){
              date_default_timezone_set('Asia/Jakarta');
              $tgl1 = $hari1;
              $query = DB::table('tm_peminjaman')
              ->selectRaw('tm_peminjaman.*,tb_siswa.pb_nama_siswa')
              ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
              ->where('tm_peminjaman.pb_stat','=','1')
              ->whereRaw('substr(tm_peminjaman.pb_harus_kembali_tgl,1,10) < "'.$hari1.'"')
              ->get();

              return $query->toArray();
      }

   		static function checkSiswaById($noSiswa){
   			$query = DB::table('tm_peminjaman')
   			->select('*')
   			->where('pb_no_siswa','=',$noSiswa)
   			->where('pb_stat','=','1')
   			->get();

   			return count($query);
   		}

      static function showRecordPinjam(){
        $query = DB::table('tm_peminjaman')->select('*')->where('pb_stat','<>','0')->get();

        return $query->toArray();
      }


    	// public $primary = 'pb_no_siswa';
    	// protected $table = 'tb_siswa';
    	
}
