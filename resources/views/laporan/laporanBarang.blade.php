
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan Barang Tersedia</title>
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
			<td colspan="5" style="font-family: tahoma;font-size: 20px;">Laporan Barang Tersedia</td>
			
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
			<th style="outline: thin solid black">Kode barang</th>
			<th style="outline: thin solid black">Nama barang</th>
			<th style="outline: thin solid black">Jenis barang</th>
			<th style="outline: thin solid black">Status barang</th>
		</tr>
		<?php 
		$x = 1;
		foreach ($showed as $key => $value) {
			?>
				<tr style="outline: thin solid black">
					<td style="outline: thin solid black">{{ $x }}</td>
					<td style="outline: thin solid black">{{ $value->br_kode }}</td>
					<td style="outline: thin solid black">{{ $value->br_nama }}</td>
					<td style="outline: thin solid black">{{ $value->jns_brg_nama }}</td>
					 @if($value->br_status == '1')
                      <td style="outline: thin solid black">Barang Kondisi Baik</td>
                      @elseif($value->br_status == '2')
                      <td style="outline: thin solid black">Barang Kondisi Rusak, Bisa Di perbaiki</td>
                      @elseif($value->br_status == '3')
                      <td style="outline: thin solid black">Barang Kondisi Rusak Total</td>
                      @elseif($value->br_status == '0')
                      <td style="outline: thin solid black">Barang Tidak Tersedia</td>
                      @endif
				</tr>
			<?php
			$x++;
		} ?>
	</tbody>
</table>
</body>
</html>