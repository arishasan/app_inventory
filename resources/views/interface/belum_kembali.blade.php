    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi Inventory
        <small>List Barang Belum Kembali</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Barang Belum Kembali</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-user"></i></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table id="table_peminjaman" class="table table-hover">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
            </tr>
          </thead>
          <tbody>
              @foreach($listBelumKembali as $value)
                <tr>
                  <td>{{ $value->br_kode }}</td>
                  <td>{{ $value->br_nama }}</td>
                  <td>{{ $value->jns_brg_nama }}</td>
                </tr>
              @endforeach
          </tbody>
        </table>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <code>Footer</code>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
 
    
    </section>
    <!-- /.content -->
    @endsection