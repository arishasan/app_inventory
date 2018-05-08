    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Barang Inventaris
        <small>Daftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li>Data Barang</li>
       <li class="active">Input Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-plus"></i> Input Barang</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <form action="{{ url('barang/terima') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="text" name="nm_brg" id="nm_brg" placeholder="Nama Barang" class="form-control">
                  <br/>
                   <select name="jns_brg" id="jns_brg" class="form-control">
                     <option value="">[Pilih Jenis Barang]</option>
                     @foreach($jns as $a)
                     <option value="{{ $a->jns_brg_kode }}">{{ $a->jns_brg_nama }}</option>
                     @endforeach
                   </select>
                  <br/>
                  <select name="status_brg" id="status_brg" class="form-control">
                      <option value="">[Pilih keadaan Barang]</option>
                      <option value="0">Barang Tidak Ada</option>
                      <option value="1">Kondisi Barang Baik</option>
                      <option value="2">Kondisi Barang Rusak, Masih bisa diperbaiki</option>
                      <option value="3">Kondisi Barang Rusak Total</option>
                  </select>
                  
                </p>
              <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          x
         </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>


       
 
    
    </section>
    <!-- /.content -->
    @endsection