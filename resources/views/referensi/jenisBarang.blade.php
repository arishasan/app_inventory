    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jenis Barang inventaris
        <small>CRUD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Referensi</li>
       <li class="active">Jenis Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-database"></i> List Jenis Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <button type="button" data-toggle="modal" data-target="#addJenis" class="btn btn-success btn-flat editJenisBarangTerpilih" >Add Data</button>
          <hr>
          <table class="table table-hover" id="listJenisBarang">
            <thead>
              <tr>
                <th>ID Jenis Barang</th>
                <th>Nama Jenis Barang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($list as $row)
              <tr>
                <td>{{ $row->jns_brg_kode }}</td>
                <td>{{ $row->jns_brg_nama }}</td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#editJenis" class="btn btn-success btn-flat editJenisBarangTerpilih" ><i class="fa fa-pencil"></i></button>
                  &nbsp;
                  <button type="button" data-toggle="modal" data-target="#hapusJenis" class="btn btn-danger btn-flat deleteJenisBarangTerpilih" ><i class="fa fa-trash"></i></button>
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

    <div id="editJenis" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Jenis Barang Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/jenis/edit') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="jenis_kd" id="jenis_kd">
                  <input type="text" name="jenis_nm" id="jenis_nm" placeholder="Nama Jenis Barang" class="form-control">
                  <br/>
                  
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

        <div id="addJenis" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Jenis Barang</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/jenis/add') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="text" name="jenis_nm" id="jenis_nm" placeholder="Nama Jenis Barang" class="form-control">
                  <br/>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="hapusJenis" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Jenis Barang Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/jenis/delete') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="jenis_kd" id="jenis_kd1">
                  
                  Anda yakin akan menghapus data jenis barang bernama <b class="showNamaJenisHere"></b>
                  
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