    @extends('templates/header')

    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Pengguna
        <small>CRUD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Referensi</li>
       <li class="active">Daftar Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('templates/feedback')
      
      <!-- Default box -->
      
             
      <div class="box">
        <div class="box-header with-border">
         <!--  <a href="{{ url('barangController/add') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a> -->

          <h3 class="box-title"><i class="fa fa-database"></i> List Daftar Pengguna</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <button type="button" data-toggle="modal" data-target="#addUser" class="btn btn-success btn-flat addData" >Add Data</button>
          <hr>
          
          <table class="table table-hover" id="table-user">
            <thead>
              <tr>
                <th>ID USER</th>
                <th>Username</th>
                <th>Hak Akses</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach($list as $row)
              <tr>
                <td>{{ $row->user_id }}</td>
                <td>{{ $row->user_nama }}</td>
                <td>{{ $row->user_hak }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#editUser" class="btn btn-success btn-flat editUserTerpilih" ><i class="fa fa-pencil"></i></button>
                  &nbsp;
                  <button type="button" data-toggle="modal" data-target="#deleteUser" class="btn btn-danger btn-flat deleteUserTerpilih" ><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
         </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>

    <div id="editUser" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update User Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/user/edit') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="user_id" id="user_id">
                  <input type="text" name="uname" id="unameEdit" placeholder="Username" class="form-control">
                  <br/>
                  <input type="password" name="pswd" id="pswdEdit" placeholder="Password" class="form-control">
                  <br/>
                  <select class="form-control" name="jenis_nm" id="jenis_nmEdit">
                    <option value="su">Superuser</option>
                    <option value="us">User</option>
                    <option value="ad">Admininstrator</option>
                  </select>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="addUser" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add User</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/user/add') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="text" name="uname" id="uname" placeholder="Username" class="form-control">
                  <br/>
                  <input type="password" name="pswd" id="pswd" placeholder="Password" class="form-control">
                  <br/>
                  <select class="form-control" name="jenis_nm" id="jenis_nm">
                    <option value="su">Superuser</option>
                    <option value="us">User</option>
                    <option value="ad">Admininstrator</option>
                  </select>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div id="deleteUser" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <form action="{{ url('referensi/user/delete') }}" method="POST">
                  {{ csrf_field() }}
                <p>
                  <input type="hidden" name="user_id" id="user_id1">
                  
                  Anda yakin akan menghapus data user dengan username <b class="showUsername"></b> Dengan hak akses <b class="hakAkses"></b>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">HAPUS</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
 
    
    </section>
    <!-- /.content -->
    @endsection