<div id="dataRecordPeminjaman">
	<span><b><i>Keterangan</i></b></span>
	<ul>
		<li style="background: #fe4d49"><b>Peminjaman Hari Terakhir</b></li>
		<li style="background: #42f887"><b>Peminjaman Berjalan</b></li>
		<li style="background: yellow"><b>Notifikasi Peminjaman 3 Hari Terakhir</b></li>
		<li style="background: grey"><b>Peminjaman Melebihi Batas Pengembalian</b></li>
	</ul>
	<hr>
	<table id="table_peminjaman" class="table table-hover">
		<thead>
			<tr>
				<th>ID Peminjaman</th>
				<th>No Peminjam</th>
				<th>Nama Peminjam</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Berakhir Peminjaman</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listPeminjaman as $value)
			
			@if(substr($value->pb_harus_kembali_tgl, 0,10) == date('Y-m-d'))
			<tr style="background: #fe4d49;">
				<td>{{ $value->pb_id }}</td>
				<td>{{ $value->pb_no_siswa }}</td>
				<td>{{ $value->pb_nama_siswa }}</td>
				<td>{{ $value->pb_tgl }}</td>
				<td>{{ $value->pb_harus_kembali_tgl }}</td>	
				<td><button class="btn btn-info btn-flat pilihRecordPinjam"><i class="fa fa-check"></i></button></td>
			</tr>
			@elseif(substr($value->pb_harus_kembali_tgl, 0,10) == date('Y-m-d', strtotime('+3 days')) || substr($value->pb_harus_kembali_tgl, 0,10) == date('Y-m-d', strtotime('+2 days')) || substr($value->pb_harus_kembali_tgl, 0,10) == date('Y-m-d', strtotime('+1 days')))
			<tr style="background: yellow;">
				<td>{{ $value->pb_id }}</td>
				<td>{{ $value->pb_no_siswa }}</td>
				<td>{{ $value->pb_nama_siswa }}</td>
				<td>{{ $value->pb_tgl }}</td>
				<td>{{ $value->pb_harus_kembali_tgl }}</td>	
				<td><button class="btn btn-info btn-flat pilihRecordPinjam"><i class="fa fa-check"></i></button></td>
			</tr>
			@elseif(substr($value->pb_harus_kembali_tgl, 0,10) < date('Y-m-d'))
			<tr style="background: grey;">
				<td>{{ $value->pb_id }}</td>
				<td>{{ $value->pb_no_siswa }}</td>
				<td>{{ $value->pb_nama_siswa }}</td>
				<td>{{ $value->pb_tgl }}</td>
				<td>{{ $value->pb_harus_kembali_tgl }}</td>	
				<td><button class="btn btn-info btn-flat pilihRecordPinjam"><i class="fa fa-check"></i></button></td>
			</tr>
			@else
			<tr style="background: #42f887">
				<td>{{ $value->pb_id }}</td>
				<td>{{ $value->pb_no_siswa }}</td>
				<td>{{ $value->pb_nama_siswa }}</td>
				<td>{{ $value->pb_tgl }}</td>
				<td>{{ $value->pb_harus_kembali_tgl }}</td>
				<td><button class="btn btn-info btn-flat pilihRecordPinjam"><i class="fa fa-check"></i></button></td>
			</tr>
			@endif
			
			@endforeach
		</tbody>
	</table>
</div>

<div id="message"></div>