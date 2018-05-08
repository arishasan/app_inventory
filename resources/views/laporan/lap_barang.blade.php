    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Daftar Barang
        <small>Laporan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Laporan</li>
        <li class="active">Laporan Daftar Barang</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
            
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">List Daftar Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           
          <a href="#" class="btn btn-info btn-flat" id="cetakListBarangAvail"><i class="fa fa-print"></i> CETAK</a>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
             <table id="listBarangLaporan" class="table table-hover">
             <thead>
               <tr>
                 <th>No.</th>
                 <th>Kode Barang</th>
                 <th>Nama Barang</th>
                 <th>Jenis Barang</th>
                 <th>Tanggal Terima</th>
                 <th>Tanggal Di Entry</th>
               </tr>
             </thead>
           <tbody>

           <?php
           $x = 1;
           
            foreach ($list as $key => $value) {
                ?>
                  <tr>
                    <td>{{ $x }}.</td>
                    <td>{{ $value->br_kode }}</td>
                    <td>{{ $value->br_nama }}</td>
                    <td>{{ $value->jns_brg_nama }}</td>
                    <td>{{ $value->br_tgl_terima }}</td>
                    <td>{{ $value->br_tgl_entry }}</td>
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