
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan Pengembalian</title>
	<script type="text/javascript">
		function cetak(){
			var delay = 1000;
			setTimeout(function(){
				window.print();
			},delay);
		}
	</script>
</head>
<body onload="cetak()">
<table>
	<thead>
		<tr>
			<td colspan="5" style="font-family: tahoma;font-size: 20px;">Laporan Pengembalian</td>
			
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
		
	</thead>
	<tbody style="outline: thin solid black">
		<tr>
			<th style="outline: thin solid black">No. </th>
			<th style="outline: thin solid black">ID Pengembalian</th>
			<th style="outline: thin solid black">ID Peminjaman</th>
			<th style="outline: thin solid black">Tanggal Kembali</th>
			<th style="outline: thin solid black">Nama Peminjam</th>
		</tr>
		<?php 
		$x = 1;
		foreach ($showed as $key => $value) {
			?>
				<tr style="outline: thin solid black">
					<td style="outline: thin solid black">{{ $x }}</td>
					<td style="outline: thin solid black">{{ $value->kembali_id }}</td>
					<td style="outline: thin solid black">{{ $value->pb_id }}</td>
					<td style="outline: thin solid black">{{ $value->kembali_tgl }}</td>
					<td style="outline: thin solid black">{{ $value->pb_nama_siswa }}</td>
				</tr>
			<?php
			$x++;
		} ?>
	</tbody>
</table>
</body>
</html>