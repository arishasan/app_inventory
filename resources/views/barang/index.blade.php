    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang Inventaris
        <small>Daftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Data Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-eye"></i> Data Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table id="daftarBarangPure" class="table table-hover">
            <thead>
              <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Tanggal Terima</th>
                <th>Tanggal Entry</th>
                <th>Status Barang</th>
                <th hidden="true">Status Barang Real</th>
                <th hidden="true">Jenis Real</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($list as $row)
              <tr>
                <td>{{ $row->br_kode }}</td>
                <td>{{ $row->br_nama }}</td>
                <td>{{ $row->jns_brg_nama }}</td>
                <td>{{ $row->br_tgl_terima }}</td>
                <td>{{ $row->br_tgl_entry }}</td>
                @if($row->br_status == '1')
                <td>Barang Kondisi Baik</td>
                @elseif($row->br_status == '2')
                <td>Barang Kondisi Rusak, Bisa Di perbaiki</td>
                @elseif($row->br_status == '3')
                <td>Barang Kondisi Rusak Total</td>
                @elseif($row->br_status == '0')
                <td>Barang Tidak Tersedia</td>
                @endif
                <td hidden="true">{{ $row->br_status }}</td>
                <td hidden="true">{{ $row->jns_brg_kode }}</td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#editBarang" class="btn btn-success btn-flat editBarangTerpilih" ><i class="fa fa-pencil"></i></button>
                  &nbsp;
                  <button type="button" data-toggle="modal" data-target="#hapusBarang" class="btn btn-danger btn-flat deleteBarangTerpilih" ><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
         </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

    <div id="editBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Barang Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('barang/update') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="kd_brg" id="kd_brg">
                  <input type="text" name="nm_brg" id="nm_brg" placeholder="Nama Barang" class="form-control">
                  <br/>
                   <select name="jns_brg" id="jns_brg" class="form-control">
                     <option value="-">[Pilih Jenis Barang]</option>
                     @foreach($jns as $a)
                     <option value="{{ $a->jns_brg_kode }}">{{ $a->jns_brg_nama }}</option>
                     @endforeach
                   </select>
                  <br/>
                  <select name="status_brg" id="status_brg" class="form-control">
                      <option value="-">[Pilih keadaan Barang]</option>
                      <option value="0">Barang Tidak Ada</option>
                      <option value="1">Kondisi Barang Baik</option>
                      <option value="2">Kondisi Barang Rusak, Masih bisa diperbaiki</option>
                      <option value="3">Kondisi Barang Rusak Total</option>
                  </select>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="hapusBarang" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Barang Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('barang/delete') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="kd_brg" id="kd_brg1">
                  
                  Anda yakin akan menghapus data barang bernama <b class="showNamaHere"></b>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">HAPUS</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
 
    
    </section>
    <!-- /.content -->
    @endsection