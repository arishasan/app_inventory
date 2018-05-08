<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class inventoryController extends Controller
{

	public function index(){
        $data['noTransaksi'] = \App\m_inventory::getNoOtomatis();
        $data['showBarang'] = \App\modelShow::showBarang();
    	$data['showSiswa'] = \App\modelShow::showSiswa();
        $data['showRecord'] = \App\modelShow::showRecordPinjam();
    	return view('peminjaman/index')->with($data);
    }

    public function pengembalianIndex(){
        $data['listPeminjaman'] = \App\modelShow::showListPinjam();
        return view('pengembalian/index')->with($data);
    }

    public function belumKembali(){
        $data['listBelumKembali'] = \App\modelShow::showBelumKembali();
        return view('interface/belum_kembali')->with($data);
    }

    public function blacklist($id){

        $status = \App\m_inventory::blackList($id);

        if($status) return redirect('dataSiswa')->with('success','Blacklist sukses');
        else return redirect('dataSiswa')->with('error','Blacklist gagal');
    }

    public function unblacklist($id){

        $status = \App\m_inventory::unblacklist($id);

        if($status) return redirect('dataSiswa')->with('success','Unblacklist sukses');
        else return redirect('dataSiswa')->with('error','Unblacklist gagal');
    }

    public function pengembalian(Request $request){
       $rules = [
            'ID_pinjam' => 'required',
            'no_peminjam' => 'required',
            'nama_peminjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_akhir' => 'required'
       ];

       $this->validate($request, $rules);

       $input = $request->all();
       $status = \App\m_inventory::simpanPengembalian($input);

       if($status) return redirect('pengembalian')->with('success','Pengembalian sukses');
        else return redirect('pengembalian')->with('error','Pengembalian gagal');

    }

    public function getPinjam($id){
        $result = \App\modelaporan::showDetailPeminjaman($id);

        $x = 1;
        foreach ($result as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $x ?></td>
                    <td hidden="true"><input type="text" name="idDetPinjam[]" value="<?php echo $value->pbd_id ?>"></td>
                    <td><?php echo $value->br_kode ?></td>
                    <td hidden="true"><input type="hidden" name="idBarang[]" value="<?php echo $value->br_kode ?>"></td>
                    <td><?php echo $value->br_nama ?></td>
                    <td><?php echo $value->jns_brg_nama ?></td>
                    <?php
                        if($value->br_status == '1') echo "<td>Barang Kondisi Baik</td>";
                            elseif($value->br_status == '2') echo "<td>Barang Kondisi Rusak (bisa diperbaiki)</td>";
                    ?>
                </tr>
            <?php
            $x++;
        }

    }

    public function simpan(Request $request){

    	$rules = [
    		'tanggalJumlah' => 'required',
    		'noSiswa' => 'required',
    		'namaSiswa' => 'required'
    	];

    	$this->validate($request, $rules);

    	$input = $request->all();
    	$status = \App\m_inventory::simpanPeminjaman($input);

        $url = url("cetak_nota_pinjam").'/'.$status;

    	if(!empty($status)) return redirect('peminjaman')->with('success','Peminjaman sukses <a href="'.$url.'" target="_blank" class="btn btn-info btn-flat">Cetak Nota!</a>');
    	else return redirect('peminjaman')->with('error','Peminjaman gagal, besar kemungkinan siswa tersebut sedang meminjam.');
    	
    }

    public function update(Request $request){

        $input = $request->all();

        if($input['tanggalJumlah'] == ''){

            $doUpd1 = \App\m_inventory::updatePeminjaman1($input);

            if($doUpd1) return redirect('peminjaman')->with('success','Update peminjaman sukses');
        else return redirect('peminjaman')->with('error','Update peminjaman gagal/ Tidak ada barang yang di input.');

        }else{

            $doUpd2 = \App\m_inventory::updatePeminjaman2($input);

            if($doUpd2) return redirect('peminjaman')->with('success','Update peminjaman sukses');
        else return redirect('peminjaman')->with('error','Update peminjaman gagal/ Tidak ada barang yang di input.');

        }

    }

    public function ambilPeminjamEdit($id){

        $dt = \App\modelShow::getPeminjam($id);

        foreach ($dt as $key => $value) {
            $pb_no = $value->pb_no_siswa;
            $nama = $value->pb_nama_siswa;
            $pb = $value->pb_id;
        }

        ?>
        <div class="col-md-2"><b>No Siswa : </b><input type="text" id="noSiswaEdit" name="noSiswa" value="<?php echo $pb_no ?>" placeholder="No Siswa" class="form-control" readonly></div><div class="col-md-2"><b>Nama Siswa : </b><input id="naSiswaEdit" type="text" placeholder="Nama Siswa" value="<?php echo $nama ?>" name="namaSiswa"  class="form-control" readonly></div>

        <?php

    }

    public function ambilListbarang($id){
        $result = \App\modelaporan::showDetailPeminjaman($id);

        $x = 1;
        foreach ($result as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $x ?></td>
                    <td hidden="true"><input type="text" name="idDetPinjam[]" value="<?php echo $value->pbd_id ?>"></td>
                    <td><?php echo $value->br_kode ?></td>
                    <td hidden="true"><input type="hidden" name="idBarang[]" value="<?php echo $value->br_kode ?>"></td>
                    <td><?php echo $value->br_nama ?></td>
                    <td><?php echo $value->jns_brg_nama ?></td>
                    <?php
                        if($value->br_status == '1') echo "<td>Barang Kondisi Baik</td>";
                            elseif($value->br_status == '2') echo "<td>Barang Kondisi Rusak (bisa diperbaiki)</td>";
                    ?>
                    <td><a href="#" class="btn btn-default hapusBarangEdit">X</a></td>
                </tr>
            <?php
            $x++;
        }
    }

    public function cetakPeringatan($pb_id){
        $data['pinjam'] = \App\modelaporan::showParentPeminjaman($pb_id);
        $rec = \App\modelaporan::showDetailPeminjaman($pb_id);
        $data['jumlah'] = count($rec);
        return view('laporan/notifikasi3hari')->with($data);
    }

    public function cetakAkhir($pb_id){
        $data['pinjam'] = \App\modelaporan::showParentPeminjaman($pb_id);
        $rec = \App\modelaporan::showDetailPeminjaman($pb_id);
        $data['jumlah'] = count($rec);
        return view('laporan/notifAkhir')->with($data);
    }

    public function cetakTerakhir($pb_id){
        $data['pinjam'] = \App\modelaporan::showParentPeminjaman($pb_id);
        $rec = \App\modelaporan::showDetailPeminjaman($pb_id);
        $data['jumlah'] = count($rec);
        return view('laporan/notifikasiTerakhir')->with($data);
    }

    public function cetakNota($pb_id){
        $data['parentRecord'] = \App\modelaporan::showParentPeminjaman($pb_id);
        $data['detailRecord'] = \App\modelaporan::showDetailPeminjaman($pb_id);
        $data['id'] = $pb_id;

        return view('peminjaman/nota')->with($data);
    }
}
