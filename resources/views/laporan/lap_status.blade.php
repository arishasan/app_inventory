    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Status Barang
        <small>Laporan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Laporan</li>
        <li class="active">Laporan Status Barang</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
       
      <!-- Default box -->
      
            
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title">List Status Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
         <div class="box-body">
           
           <form action="{{ url('laporan/laporan_status_barang') }}" method="POST" id="selectedFilter">
             
             <div class="col-md-5">
               <select name="filterCetak" id="filterCetakStatus" class="form-control">
                <option value="">-</option>
               <option value="all">CETAK SEMUA</option>
               <option value="0">Barang Tidak Ada</option>
               <option value="1">Barang Kondisi Baik</option>
               <option value="2">Barang Kondisi Rusak, Bisa di perbaiki</option>
               <option value="3">Barang Rusak Total</option>
             </select>
             </div>

            {{ csrf_field() }}
          <button type="button" id="executeCETAK" class="btn btn-info btn-flat"><i class="fa fa-print"></i> CETAK</button>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
             <table class="table table-hover">
             <thead>
               <tr>
                 <th>No.</th>
                 <th>Kode Barang</th>
                 <th>Nama Barang</th>
                 <th>Jenis Barang</th>
                 <th>Status Barang</th>
               </tr>
             </thead>
           <tbody class="showItRight">

            <?php
            $x = 1;
              foreach ($listBrg as $key => $value) {
                ?>
                  <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $value->br_kode }}</td>
                    <td>{{ $value->br_nama }}</td>
                    <td>{{ $value->jns_brg_nama }}</td>
                      @if($value->br_status == '1')
                      <td>Barang Kondisi Baik</td>
                      @elseif($value->br_status == '2')
                      <td>Barang Kondisi Rusak, Bisa Di perbaiki</td>
                      @elseif($value->br_status == '3')
                      <td>Barang Kondisi Rusak Total</td>
                      @elseif($value->br_status == '0')
                      <td>Barang Tidak Tersedia</td>
                      @endif

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