<?php
	foreach ($pinjam as $key => $value) {
		$pb_id = $value->pb_id;
		$nama = $value->pb_nama_siswa;
		$no = $value->pb_no_siswa;
		$tgl = substr($value->pb_harus_kembali_tgl,0,10);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Notifikasi {{ $pb_id }}</title>
</head>
<body onload="window.print()">
<table>
	<thead>
		<tr>
			<td colspan="5" style="font-family: tahoma;font-size: 20px;">SURAT PENGEMBALIAN PINJAM BARANG</td>
			
		</tr>
		<tr>
			<td colspan="5" style="font-size: 13px;">PT.CITRA BERSEMAYAM</td>
			
		</tr>
		<tr>
			<td colspan="5"><hr></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5">Kepada , <b>{{ $nama }}</b></td>
		</tr>
		<tr>
			<td>Dengan nomor , <b>{{ $no }}</b></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="5" rowspan="5">
				<p>
					Diharapkan anda mengembalikan barang yang telah dipinjam hari ini.<br/> 
					Karena masih ada siswa yang ingin meminjam barang tersebut.<br/>
					Jika anda tidak segera mengembalikannya. Kami akan men-skor anda.<br/>
					Anda kemudian tidak bisa meminjam lagi. Barang yang anda pinjam sebanyak <b>{{ $jumlah }} Items</b><br/>
					<br/>
					<br/>
					<br/>
					<br/>
					<br/>
					Badan Peminjaman Barang, &nbsp;&nbsp;&nbsp;{{ date('m-d-Y') }}
					<br/>
					<br/>
					<br/>
					<br/>
					John Doe
				</p>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>