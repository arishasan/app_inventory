<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laporan extends Controller
{

    public function lap_barang(){
    	$data['list'] = \App\modelaporan::listBarang();
    	return view('laporan/lap_barang')->with($data);
    }

    public function cetakLaporanBarang(){
    	$data['showed'] = \App\modelaporan::listBarang();
    	return view('laporan/laporanBarang')->with($data);
    }

    public function cetakLaporanPengembalian(){
    	$data['showed'] = \App\modelaporan::listPengmbalianforLaporan();
    	return view('laporan/laporanPengembalian')->with($data);
    }

    public function cetakDetailBarangPinjam($id){
        $data['showed'] = \App\modelaporan::detailBarangDipinjam($id);
        return view('laporan/laporanDetailBarangDipinjam')->with($data);
    }

    public function lap_pengembalian(){
    	$data['pengembalian'] = \App\modelaporan::listPengembalian();
    	return view('laporan/lap_pengembalian')->with($data);
    }

    public function lap_status(){
    	$data['listBrg'] = \App\modelaporan::listStatus();
    	return view('laporan/lap_status')->with($data);
    }

    public function cetakLaporanStatus($sts){
    	$data['showed'] = \App\modelaporan::getStatus($sts);
    	return view('laporan/laporanStatus')->with($data);
    }

    public function filterStatus($sts){
    	$res = \App\modelaporan::getStatus($sts);
    	$x = 1;

    	foreach ($res as $key => $value) {
    		?>
    			<tr>
                    <td><?php echo $x ?></td>
                    <td><?php echo $value->br_kode ?></td>
                    <td><?php echo $value->br_nama ?></td>
                    <td><?php echo $value->jns_brg_nama ?></td>
                    <?php if($value->br_status == '1'){ ?>
                    <td>Barang Kondisi Baik</td>
                	<?php }elseif($value->br_status == '2'){ ?>
                	<td>Barang Kondisi Rusak, Bisa Di perbaiki</td>
                	<?php }elseif($value->br_status == '3'){ ?>
                	<td>Barang Kondisi Rusak Total</td>
                	<?php }elseif($value->br_status == '0'){ ?>
                	<td>Barang Tidak Tersedia</td>
               		<?php } ?>

                  </tr>
    		<?php
    		$x++;
    	}

    }

}
