    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->

    <?php $listPeminjaman = \App\modelShow::showListPinjam(); ?>

    <section class="content-header">
      <h1>
        Dashboard
        <small>Home of all place</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      

  <div class="col-md-12">
      
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Grafik Peminjaman Per Hari</h3>
          
        </div>
        <div class="box-body">
          
          <div id="chart" style="height: 250px"></div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

  </div>

  <div class="col-md-6">
      
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Jumlah Transaksi Peminjaman</h3>
          
        </div>
        <div class="box-body">
          <?php foreach ($countPeminjaman as $key => $value) {
            $ck = $value->jm;
          } ?>
          <center><h1>{{ $ck }} <i>Transaksi</i></h1></center>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

  </div>

  <div class="col-md-6">
      
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Jumlah Barang Yang Sudah Di Entry</h3>
          
        </div>
        <div class="box-body">
          
          <?php foreach ($entry as $key => $value) {
            $ck = $value->jm;
          } ?>
          <center><h1>{{ $ck }} <i>Entry</i></h1></center>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

  </div>
    
    </section>
    <!-- /.content -->
    @endsection