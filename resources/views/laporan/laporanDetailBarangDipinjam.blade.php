
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan Detail Barang Yang Dipinjam</title>
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
			<td colspan="5" style="font-family: tahoma;font-size: 20px;">Laporan Detail Barang Yang Dipinjam</td>
			
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
			<th style="outline: thin solid black">ID Peminjaman</th>
			<th style="outline: thin solid black">Kode barang</th>
			<th style="outline: thin solid black">Nama barang</th>
			<th style="outline: thin solid black">Jenis barang</th>
		</tr>
		<?php 
		$x = 1;
		foreach ($showed as $key => $value) {
			?>
				<tr style="outline: thin solid black">
					<td style="outline: thin solid black">{{ $value->pb_id }}</td>
					<td style="outline: thin solid black">{{ $value->br_kode }}</td>
					<td style="outline: thin solid black">{{ $value->br_nama }}</td>
					<td style="outline: thin solid black">{{ $value->jns_brg_nama }}</td>
				</tr>
			<?php
			$x++;
		} ?>
	</tbody>
</table>
</body>
</html>