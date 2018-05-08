    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Inventory
        <small>Pengembalian</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengembalian</li>
      </ol>
    </section>

    @include('pengembalian/modal')

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
       <form action="{{ url('pengembalian/simpan') }}" method="POST">
      <!-- Default box -->
      {{ csrf_field() }}
             <input type="submit" value="KEMBALIKAN" name="btnSub" class="btn btn-danger">
             <hr>
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Form Cari Peminjaman</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
             
            <div class="row">
            <div class="col-md-2">
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                      <button type="button" id="listPinjamCari" class="btn btn-info btn-flat">List Peminjaman!</button>
                    </span>
              </div>
            </div>

            
           </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="row">
            <div class="col-md-2">
               <span><b>ID Peminjaman</b></span>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                     <input type="text" id="id_pinjam" name="ID_pinjam" class="form-control" readonly>
                    </span>
              </div>
            </div>

            <div class="col-md-2">
               <span><b>No Peminjam</b></span>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                     <input type="text" id="no_peminjam" name="no_peminjam" class="form-control" readonly>
                    </span>
              </div>
            </div>

             <div class="col-md-2">
               <span><b>Nama Peminjam</b></span>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                     <input type="text" id="nama_peminjam" name="nama_peminjam" class="form-control" readonly>
                    </span>
              </div>
            </div>

            <div class="col-md-3">
               <span><b>Tanggal Pinjam</b></span>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                     <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" readonly>
                    </span>
              </div>
            </div>

            <div class="col-md-3">
               <span><b>Tanggal Akhir Peminjaman</b></span>
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                     <input type="text" id="tgl_akhir" name="tgl_akhir" class="form-control" readonly>
                    </span>
              </div>
            </div>

           </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
        

        <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Detail Barang Yang Di pinjam</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="input-group input-group-sm pull-right">
                
                     <button type="button" id="reseto" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-refresh"></i></button>
                
              </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <table class="table table-hover" id="tableListPinjamBarang">
            <thead style="text-align: center;">
              <tr>
                <th>No. </th>
                <th hidden="true">ID Detail</th>
                <th>ID Barang</th>
                <th hidden="true">ID Barang Real</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status Barang</th>
              </tr>
            </thead>
            <tbody class="showDetailhere">
              
              
            </tbody>
          </table>
        </div>
        <!-- /.box-footer-->
      </div>

        

        </form>
    
    </section>
    <!-- /.content -->
    @endsection