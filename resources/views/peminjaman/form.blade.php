    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Kelas
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Data Kelas</li>
        <li class="active">Tambah Data Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <a href="{{ url('/') }}" class="btn bg-purple"><i class="glyphicon glyphicon-left"></i> Kembali</a>
          <!-- <h3 class="box-title">Title</h3> -->
         <!--  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">
          
          <form method="POST" action="{{ url('barangController/add') }}" class="form-horizontal">
            {{ csrf_field() }}
              <div class="form-group">
                <label class="control-label col-sm-2">Nama Barang</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang..." />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Jenis Barang</label>
                <div class="col-sm-10">
                  <input type="text" name="jenis_barang" class="form-control" placeholder="Masukkan Jenis Barang..." />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Merek Barang</label>
                <div class="col-sm-10">
                  <input type="text" name="Merek" class="form-control" placeholder="Masukkan Merek Barang..." />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> SIMPAN</button>
                </div>
              </div>

          </form>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    @endsection