<div id="dataSiswa">
	<table id="table_siswa" class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>No Siswa</th>
				<th>Nama Siswa</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($showSiswa as $row)
				<tr>
					<td>{{ !empty($i) ? ++$i : $i = 1 }}</td>
					<td>{{ $row->pb_no_siswa }}</td>
					<td>{{ $row->pb_nama_siswa }}</td>
					<td><button class="ambil">Pilih</button></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div id="dataBarang">
	<table id="table_barang" class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Jenis Barang</th>
				<th>Status Barang</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($showBarang as $row)
				<tr>
					<td>{{ !empty($ii) ? ++$ii : $ii = 1 }}</td>
					<td>{{ $row->br_kode }}</td>
					<td>{{ $row->br_nama }}</td>
					<td>{{ $row->jns_brg_nama }}</td>
					
					@if($row->br_status == '1')
					<td>Barang Kondisi Baik</td>
					@elseif($row->br_status == '2')
					<td>Barang Kondisi Rusak, Bisa Di perbaiki</td>
					@elseif($row->br_status == '3')
					<td>Barang Kondisi Rusak Total</td>
					@elseif($row->br_status == '0')
					<td>Barang Tidak Tersedia</td>
					@endif

					@if($row->br_status == '0')
						<td><button disabled="disabled">Barang Tidak Ada</button></td>
					@else
						<td><button class="ambilBarang">Pilih</button></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


<div id="dataBarangEdit">
	<table id="table_barangEdit" class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Jenis Barang</th>
				<th>Status Barang</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($showBarang as $row)
				<tr>
					<td>{{ !empty($ii) ? ++$ii : $ii = 1 }}</td>
					<td>{{ $row->br_kode }}</td>
					<td>{{ $row->br_nama }}</td>
					<td>{{ $row->jns_brg_nama }}</td>
					
					@if($row->br_status == '1')
					<td>Barang Kondisi Baik</td>
					@elseif($row->br_status == '2')
					<td>Barang Kondisi Rusak, Bisa Di perbaiki</td>
					@elseif($row->br_status == '3')
					<td>Barang Kondisi Rusak Total</td>
					@elseif($row->br_status == '0')
					<td>Barang Tidak Tersedia</td>
					@endif

					@if($row->br_status == '0')
						<td><button disabled="disabledEdit">Barang Tidak Ada</button></td>
					@else
						<td><button class="ambilBarangEdit">Pilih</button></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div id="doneMessage"></div>