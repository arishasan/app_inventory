    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pengembalian Barang
        <small>Laporan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Laporan</li>
        <li class="active">Laporan Pengembalian Barang</li>
      </ol>
    </section>

    @include('laporan/modal')

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
            
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">List Pengembalian Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           
          <a href="#" class="btn btn-info btn-flat" id="cetakPengembalianRecord"><i class="fa fa-print"></i> CETAK</a>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
             <table id="listBarangLaporan" class="table table-hover">
             <thead>
               <tr>
                 <th>No.</th>
                 <th>ID Pengembalian</th>
                 <th>ID Peminjaman</th>
                 <th>Tanggal Kembali</th>
                 <th>Cetak Detail</th>
               </tr>
             </thead>
           <tbody>

          <?php
          $x = 1;
            foreach ($pengembalian as $key => $value) {
              ?>

                <tr>
                  <td>{{ $x }}</td>
                  <td>{{ $value->kembali_id }}</td>
                  <td>{{ $value->pb_id }}</td>
                  <td>{{ $value->kembali_tgl }}</td>
                  <td><a href="{{ url('cetakDetail') }}/{{ $value->pb_id }}" target="_blank" class="btn btn-danger btn-flat"><i class="fa fa-eye"></i></a></td>
                </tr>

              <?php
              $x++;
            }
          ?>
           
            
           </tbody>
            </table>
           </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
        

        

        

       
    
    </section>
    <!-- /.content -->
    @endsection