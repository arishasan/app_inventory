<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class modelaporan extends Model
{
    static function showParentPeminjaman($pb_id){
    	$query = DB::table('tm_peminjaman')
    	->selectRaw('tm_peminjaman.*,tb_siswa.pb_nama_siswa')
    	->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
    	->where('tm_peminjaman.pb_id','=',$pb_id)
    	->get();

    	return $query->toArray();
    }

    static function showDetailPeminjaman($pb_id){
    	$query = DB::table('td_peminjaman_barang')
    	->selectRaw('td_peminjaman_barang.*,tm_barang_inventaris.br_nama,tr_jenis_barang.jns_brg_nama,tm_barang_inventaris.br_status')
    	->join('tm_barang_inventaris','td_peminjaman_barang.br_kode','=','tm_barang_inventaris.br_kode')
    	->join('tr_jenis_barang','tm_barang_inventaris.jns_brg_kode','=','tr_jenis_barang.jns_brg_kode')
    	->where('td_peminjaman_barang.pb_id','=',$pb_id)
    	->get();

    	return $query->toArray();
    }

    static function listBarang(){
        $query = DB::table('tm_barang_inventaris')
        ->selectRaw('tm_barang_inventaris.*,tr_jenis_barang.jns_brg_nama')
        ->join('tr_jenis_barang','tm_barang_inventaris.jns_brg_kode','=','tr_jenis_barang.jns_brg_kode')
        ->get();

        return $query->toArray();
    }

    static function listPengembalian(){
        $query = DB::table('tm_pengembalian')
        ->select('*')
        ->get();

        return $query->toArray();
    }

    static function listStatus(){
        $query = DB::table('tm_barang_inventaris')
        ->selectRaw('tm_barang_inventaris.*,tr_jenis_barang.jns_brg_nama')
        ->join('tr_jenis_barang','tm_barang_inventaris.jns_brg_kode','=','tr_jenis_barang.jns_brg_kode')
        ->get();

        return $query->toArray();
    }

    static function getStatus($s){
        
        if($s == 'all'){
             $query = DB::table('tm_barang_inventaris')
            ->selectRaw('tm_barang_inventaris.*,tr_jenis_barang.jns_brg_nama')
            ->join('tr_jenis_barang','tm_barang_inventaris.jns_brg_kode','=','tr_jenis_barang.jns_brg_kode')
            ->get();

            return $query->toArray();
        }else{
            $query = DB::table('tm_barang_inventaris')
            ->selectRaw('tm_barang_inventaris.*,tr_jenis_barang.jns_brg_nama')
            ->join('tr_jenis_barang','tm_barang_inventaris.jns_brg_kode','=','tr_jenis_barang.jns_brg_kode')
            ->where('tm_barang_inventaris.br_status','=',$s)
            ->get();

            return $query->toArray();
        }

    }

    static function listPengmbalianforLaporan(){
        $query = DB::table('tm_pengembalian')
            ->selectRaw('tm_pengembalian.*,tm_peminjaman.pb_no_siswa,tb_siswa.pb_nama_siswa')
            ->join('tm_peminjaman','tm_pengembalian.pb_id','=','tm_peminjaman.pb_id')
            ->join('tb_siswa','tm_peminjaman.pb_no_siswa','=','tb_siswa.pb_no_siswa')
            ->get();

        return $query->toArray();
    }

    static function detailBarangDipinjam($id){
        $query = DB::table('td_peminjaman_barang')
        ->selectRaw('td_peminjaman_barang.pb_id,td_peminjaman_barang.br_kode,tm_barang_inventaris.br_nama,tr_jenis_barang.jns_brg_nama')
        ->join('tm_barang_inventaris','td_peminjaman_barang.br_kode','=','tm_barang_inventaris.br_kode')
        ->join('tr_jenis_barang','tr_jenis_barang.jns_brg_kode','=','tm_barang_inventaris.jns_brg_kode')
        ->where('td_peminjaman_barang.pb_id','=',$id)
        ->get();

        return $query->toArray();
    }
}
