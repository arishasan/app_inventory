    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
        <small>Inventory Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Data Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-user"></i> Data Siswa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <table id="tableSiswa" class="table table-hover">
            <thead>
              <tr>
                <th>ID Siswa</th>
                <th>Nama Siswa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($result as $value)
              <tr>
                <td>{{ $value->pb_no_siswa }}</td>
                <td>{{ $value->pb_nama_siswa }}</td>
                <td> 
                  <?php
                    if($value->status_peminjaman == '1'){
                      ?>
                      <a href="{{ url('blacklist') }}/{{ $value->pb_no_siswa }}" class="btn btn-warning btn-flat" title="BLACKLIST"><i class="fa fa-close"></i></a>
                      &nbsp;
                      <?php
                    }else{
                      ?>
                      <a href="{{ url('unblacklist') }}/{{ $value->pb_no_siswa }}" class="btn btn-info btn-flat" title="UNBLACKLIST"><i class="fa fa-check"></i></a>
                      &nbsp;
                      <?php
                    }
                  ?>
                  <button type="button" class="btn btn-success btn-flat editSiswa" title="Edit"><i class="fa fa-pencil"></i></button>
                  &nbsp;
                  <button type="button" class="btn btn-danger btn-flat deleteSiswa" title="Hapus"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer aksiAksi">
         <button type="button" class="btn btn-info btn-flat" id="addSiswa"><div class="changeJudulAksiSiswa">Add Data Siswa</div></button>
         <hr>
         <div class="formSiswa">
          <h3 style="font-family: tahoma" class="judulSiswa">Add Siswa</h3>
          <h6 class="konfirmasi"></h6>
          <hr>
           <form action="{{ url('methodSiswa') }}" method="POST">
             <div class="col-md-5 holderNama">
               <input type="text" name="namaSiswa" id="namaSiswa_kh" class="form-control" placeholder="Nama Siswa">
             </div>
             <div class="col-md-2">
              {{ csrf_field() }}
               <input type="submit" name="btnAdd" id="submitMethod" value="SUBMIT" class="form-control">
             </div>
             <div class="showAnotherButtonNO"></div>
             <div id="khususAppendID" hidden="true"></div>
           </form>
         </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
 
    
    </section>
    <!-- /.content -->
    @endsection