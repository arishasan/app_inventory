<?php
	foreach ($parentRecord as $key => $value) {
		$tgl = $value->pb_tgl;
		$akhir = $value->pb_harus_kembali_tgl;
		$id_siswa = $value->pb_no_siswa;
		$nama_siswa = $value->pb_nama_siswa;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nota Peminjaman {{ $id }}</title>
</head>
<body onload="window.print()">
<table>
	<thead>
		<tr>
			<td colspan="5" style="font-family: tahoma;font-size: 20px;">NOTA PEMINJAMAN BARANG</td>
			
		</tr>
		<tr>
			<td colspan="5" style="font-size: 13px;">PT.CITRA BERSEMAYAM</td>
			
		</tr>
		<tr>
			<td colspan="5"><hr></td>
		</tr>
		<tr>
			<td colspan="5">Tanggal Pinjam : <b>{{ $tgl }}</b></td>
		</tr>
		<tr>
			<td colspan="5">Tanggal Akhir Pinjam : <b>{{ $akhir }}</b></td>
		</tr>
		<tr>
			<td colspan="5"><hr></td>
		</tr>
		<tr>
			<td colspan="5">ID Siswa : <b>{{ $id_siswa }}</b></td>
		</tr>
		<tr>
			<td colspan="5">Nama Siswa : <b>{{ $nama_siswa }}</b></td>
		</tr>
		<tr>
			<td colspan="5"><hr></td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" style="font-family: tahoma;font-size: 17px;">Detail Barang Dipinjam</td>
		</tr>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
	</thead>
	<tbody>
		<tr style="outline: thin solid black">
			<th style="outline: thin solid black">ID Pinjam Barang</th>
			<th style="outline: thin solid black">Kode barang</th>
			<th style="outline: thin solid black">Nama Barang</th>
			<th style="outline: thin solid black">Jenis Barang</th>
			<th style="outline: thin solid black">Status Barang</th>
		</tr>
		@foreach($detailRecord as $value)
			<tr style="outline: thin solid black">
				<td style="outline: thin solid black">{{ $value->pbd_id }}</td>
				<td style="outline: thin solid black">{{ $value->br_kode }}</td>
				<td style="outline: thin solid black">{{ $value->br_nama }}</td>
				<td style="outline: thin solid black">{{ $value->jns_brg_nama }}</td>

				@if($value->br_status == '1')
				<td style="outline: thin solid black">Barang Normal</td>
				@elseif($value->br_status == '2')
				<td style="outline: thin solid black">Barang Rusak(bisa diperbaiki)</td>
				@endif

			</tr>
		@endforeach

		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="5"><hr></td>
		</tr>

		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="5"><b>NB :</b><i> Segera kembalikan tepat waktu ya.</i></td>
		</tr>
	</tbody>
</table>
</body>
</html>