    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Inventory
        <small>Peminjaman</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('peminjaman') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Peminjaman</li>
      </ol>
    </section>

    @include('templates/modal')

    <!-- Main content -->
             <hr>
             &nbsp;&nbsp;&nbsp;<input type="button" value="Record Peminjaman" id="rec_pinjam" class="btn btn-success">
             <input type="button" value="Add Peminjaman" id="add_pinjam" class="btn btn-info">
             <hr>

    <section class="content" id="addPeminjaman">
      @include('templates/feedback')
       <form action="{{ url('Inventory/simpan') }}" method="POST">
      <!-- Default box -->
      {{ csrf_field() }}
             <input type="submit" value="SUBMIT" name="btnSub" class="btn btn-success">
             <hr>
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Form Cari Siswa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          
             
            <div class="row">
            <div class="col-md-12">
            <div class="input-group input-group-sm">
                    <span class="input-group-btn">
                      <button type="button" id="btnCari" class="btn btn-info btn-flat">Cari Siswa!</button>
                    </span>
              </div>
            </div>
           </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class="showSiswaHere">
          <div class="col-md-2"><b>No Siswa : </b><input type="text" id="noSiswa" name="noSiswa" placeholder="No Siswa" class="form-control" readonly></div><div class="col-md-2"><b>Nama Siswa : </b><input id="naSiswa" type="text" placeholder="Nama Siswa" name="namaSiswa"  class="form-control" readonly></div>
         </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        

        <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Form Main Transaction</h3>
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
               <span><b>Tanggal Sekarang</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="text" id="tanggalSekarang" name="tanggalSekarang" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('m/d/Y') ?>" class="form-control" readonly />
                
              </div>
            </div>
            <div class="col-md-2">
               <span><b>Banyak Hari Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="number" id="lamaPinjam" min="0" max="100" name="tanggalJumlah" class="form-control"  />
                
              </div>
            </div>
            <div class="col-md-2">
               <span><b>Tanggal Akhir Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="date" id="tanggalAkhir" name="tanggalAkhir"  class="form-control" readonly />
                
              </div>
            </div>

            <div class="col-md-2">
               <span><b>Jam Akhir Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="time" name="jamAkhir"  class="form-control"  />
                
              </div>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-md-12">
            <div class="input-group input-group-sm">
                
                    <span class="input-group-btn">
                      <button type="button" id="btnAmbilbarang" class="btn btn-warning btn-flat pull-right">Ambil Barang!</button>
                      <button type="button" id="btnClearBarang" class="btn btn-danger btn-flat pull-right">Bersihkan!</button>
                    </span>
              </div>
            </div>
           </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <table class="table table-hover" id="tableListBarang">
            <thead style="text-align: center;">
              <tr>
                <th>No. </th>
                <th>ID Barang</th>
                <th hidden="true">ID Barang Real</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status Barang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="showBarangHere">
              

              
            </tbody>
          </table>
        </div>
        <!-- /.box-footer-->
      </div>
      
      </form>
    
    </section>
    <!-- /.content -->


    <!-- CONTAINER EDIT AND SHOW DATA -->

    <section class="content" id="dataPeminjaman">
      @include('templates/feedback')
       
      <!-- Default box -->
      
      
        {{ csrf_field() }}
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Record Peminjaman</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table class="table table-hover" id="recordPeminjaman">
            <thead style="text-align: center;">
              <tr>
                <th>No. </th>
                <th>ID Peminjaman</th>
                <th>Tanggal Pinjam</th>
                <th>No Siswa</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($showRecord as $value)
              <tr>
                <td>{{ !empty($a) ? ++$a : $a = 1 }}</td>
                <td>{{ $value->pb_id }}</td>
                <td>{{ $value->pb_tgl }}</td>
                <td>{{ $value->pb_no_siswa }}</td>
                <td>{{ $value->pb_harus_kembali_tgl }}</td>
                <td>
                  <a href="#" title="Edit" class="btn btn-info btn-flat editPeminjaman"><i class="fa fa-pencil"></i></a>
                  &nbsp;
                  <a href="{{ url('cetak_nota_pinjam') }}/{{ $value->pb_id }}" target="_blank" title="Detail" class="btn btn-success btn-flat"><i class="fa fa-print"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <code>Footer</code>
        </div>
        <!-- /.box-footer-->
      </div>

       <form action="{{ url('Inventory/update') }}" method="POST">

      <div id="contentEdit"> <div class="box">   <div class="box-header with-border">  

          <h3 class="box-title">Form Update Peminjaman</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" id="tutupdit" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="col-md-1">
               <input type="submit" name="btnSave" value="SUBMIT" class="btn btn-success">
             </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="hidden" name="idPinjam" id="idPinjam" value="">
         <div class="showSiswaHereEdit">
          
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        

        <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">Form Main Transaction</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          
            <div class="row">
            <div class="col-md-2">
               <span><b>Tanggal Sekarang</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="text" id="tanggalSekarangEdit" name="tanggalSekarang" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('m/d/Y') ?>" class="form-control" readonly />
                
              </div>
            </div>
            <div class="col-md-2">
               <span><b>Banyak Hari Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="number" id="lamaPinjamEdit" min="0" max="100" name="tanggalJumlah" class="form-control"  />
                
              </div>
            </div>
            <div class="col-md-2">
               <span><b>Tanggal Akhir Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="date" id="tanggalAkhirEdit" name="tanggalAkhir"  class="form-control" readonly />
                
              </div>
            </div>

            <div class="col-md-2">
               <span><b>Jam Akhir Pinjam</b></span>
            <div class="input-group input-group-sm">
                
                     <input type="time" name="jamAkhir"  class="form-control"  />
                
              </div>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-md-12">
            <div class="input-group input-group-sm">
                
                    <span class="input-group-btn">
                      <button type="button" id="btnAmbilbarangEdit" class="btn btn-warning btn-flat pull-right">Ambil Barang!</button>
                      <button type="button" id="btnClearBarangEdit" class="btn btn-danger btn-flat pull-right">Bersihkan!</button>
                    </span>
              </div>
            </div>
           </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <table class="table table-hover" id="tableListBarangEdit">
            <thead style="text-align: center;">
              <tr>
                <th>No. </th>
                <th>ID Barang</th>
                <th hidden="true">ID Barang Real</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Status Barang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="showBarangHereEdit">
              

              
            </tbody>
          </table>


        </div>
        <!-- /.box-footer-->
      </div>
      </div>

      {{ csrf_field() }}
    </form>
    
    </section>
    @endsection