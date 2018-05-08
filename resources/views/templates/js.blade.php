
<script type="text/javascript">

  <?php
    if(!empty(Request::Segment(1))){

    }else{
  ?>

  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
                      data: [
                            <?php
                            foreach($rekordTransaksiPeminjaman as $row): ?>
                                { y: '<?php echo $row->rekordTgl; ?>', a: <?php echo $row->recordPerHari ?>},
                            <?php endforeach?>
                        ],
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Rekord Peminjaman Data Per Hari'],
                        resize: true,
                        hideHover: true,
                        xLabels: 'day',
                        gridTextSize: '10px',
                        lineColors: ['#1caf9a','#33414E'],
                        gridLineColor: '#E5E5E5'
});

  <?php } ?>
</script>

<script type="text/javascript">

  // FUNCTION KHUSUS REFERENSI
  $('#table-user').DataTable();
  $('#listJenisBarang').DataTable();

  $('#listJenisBarang').on('click','.editJenisBarangTerpilih',function(){
    var kode = $(this).closest('tr').find('td:eq(0)').text();
    var nama = $(this).closest('tr').find('td:eq(1)').text();

    $('#jenis_kd').val(kode);
    $('#jenis_nm').val(nama);
  });

  $('#listJenisBarang').on('click','.deleteJenisBarangTerpilih',function(){
    var kode = $(this).closest('tr').find('td:eq(0)').text();
    var nama = $(this).closest('tr').find('td:eq(1)').text();

    $('#jenis_kd1').val(kode);
    $('.showNamaJenisHere').html(nama);
  });

  $('#table-user').on('click','.editUserTerpilih',function(){
    var kode = $(this).closest('tr').find('td:eq(0)').text();
    var uname = $(this).closest('tr').find('td:eq(1)').text();
    var akses = $(this).closest('tr').find('td:eq(2)').text();

    $('#user_id').val(kode);
    $('#unameEdit').val(uname);
    $('#jenis_nmEdit').val(akses);
  });

  $('#table-user').on('click','.deleteUserTerpilih',function(){
      var kode = $(this).closest('tr').find('td:eq(0)').text();
      var uname = $(this).closest('tr').find('td:eq(1)').text();
      var akses = $(this).closest('tr').find('td:eq(2)').text();

      $('#user_id1').val(kode);
      $('.showUsername').html(uname);
      $('.hakAkses').html(akses);
    });

  // END


  // FUNCTION KHUSUS BARANG INVENTARIS

  $(function(){
      $('#daftarBarangPure').DataTable();

      $('#daftarBarangPure').on('click','.editBarangTerpilih',function(){
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        var nama = $(this).closest('tr').find('td:eq(1)').text();
        var jenis = $(this).closest('tr').find('td:eq(7)').text();
        var kondisi = $(this).closest('tr').find('td:eq(6)').text();

        $('#kd_brg').val(kode);
        $('#nm_brg').val(nama);
        $('#jns_brg').val(jenis);
        $('#status_brg').val(kondisi);
      });

      $('#daftarBarangPure').on('click','.deleteBarangTerpilih',function(){
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        var nama = $(this).closest('tr').find('td:eq(1)').text();

        $('#kd_brg1').val(kode);
        $('.showNamaHere').html(nama);
      });
  });

  // END


  // FUNCTION KHUSUS SISWA

  $(function(){
    $('.formSiswa').hide();

    $('.aksiAksi').on('click','#addSiswa',function(){
      $('.changeJudulAksiSiswa').html("Tutup");
      $(this).attr('id','tutupForm');

      $('#khususAppendID').html('');
      $('#namaSiswa_kh').val('');
      $('.judulSiswa').html('Add Siswa');
      $('#submitMethod').attr('name','btnAdd');

      $('.konfirmasi').html('');
      $('#submitMethod').val('SUBMIT');
      $('.showAnotherButtonNO').html('');
      $('.holderNama').css('display','inline');
      
      $('.formSiswa').slideDown();
    });

    $('.aksiAksi').on('click','#tutupForm',function(){
      $('.changeJudulAksiSiswa').html("Add Data Siswa");
      $(this).attr('id','addSiswa');

      $('.formSiswa').slideUp();
    });

    $('.editSiswa').click(function(){
      var kode = $(this).closest('tr').find('td:eq(0)').text();
      var nama = $(this).closest('tr').find('td:eq(1)').text();

      $('#khususAppendID').html('<input type="text" name="noSiswa" value="'+kode+'">');
      $('#namaSiswa_kh').val(nama);
      $('.formSiswa').slideDown();
      $('.judulSiswa').html('Edit Siswa '+kode);
      $('#submitMethod').attr('name','btnEdit');

       $('.changeJudulAksiSiswa').html("Tutup");
       $('#addSiswa').attr('id','tutupForm');
    });

    $('.deleteSiswa').click(function(){
      var kode = $(this).closest('tr').find('td:eq(0)').text();
      var nama = $(this).closest('tr').find('td:eq(1)').text();

      $('#khususAppendID').html('<input type="text" name="noSiswa" value="'+kode+'">');

      $('.formSiswa').slideDown();
      $('.judulSiswa').html('Delete Siswa '+kode);
      $('#submitMethod').attr('name','btnDelete');
      $('#submitMethod').attr('value','Ya');

      $('.showAnotherButtonNO').html('<div class="col-md-2"><button type="button" id="tidakJadiDelete" class="form-control">Tidak</button></div>')

      $('.holderNama').css('display','none');
      $('.konfirmasi').html('Anda yakin akan menghapus siswa bernama <b>'+nama+'</b>');

       $('.changeJudulAksiSiswa').html("Tutup");
       $('#addSiswa').attr('id','tutupForm');
    });

    $('.showAnotherButtonNO').on('click','#tidakJadiDelete',function(){
      $('.changeJudulAksiSiswa').html("Add Data Siswa");
      $(this).attr('id','addSiswa');

      $('.formSiswa').slideUp();
    });

  });


  // END
  
  $(function(){

    var x = 0;
    var xx = 0;

    $('#tableSiswa').DataTable();

    $('#filterCetakStatus').change(function(){
      var getCode = $(this).val();
      var url = '{{ url("cekStatus") }}/'+getCode;

      $.get(url,function(show){
        $('.showItRight').html(show);
      });
    });

    $('#executeCETAK').click(function(e){
      e.preventDefault();
      var url = '{{ url("cetakFilter") }}';
      var data = $('#filterCetakStatus').val();

      window.location = '{{ url("laporan/laporan_status_barang") }}';

      var getMirroredWeb = '{{ url("cetakFilter") }}/'+data;
      var new_web = window.open(getMirroredWeb, "Laporan Status Barang","menubar=0","location=0","height=500","width=860");

    });

    $('#cetakListBarangAvail').click(function(e){
      e.preventDefault();
      var url = '{{ url("cetakBarang") }}';

      window.location = '{{ url("laporan/laporan_barang") }}';

      var getMirroredWeb = '{{ url("cetakBarang") }}';
      var new_web = window.open(getMirroredWeb, "Laporan List Barang","menubar=0","location=0","height=500","width=860");
    });

    $('#cetakPengembalianRecord').click(function(e){
      e.preventDefault();
      var url = '{{ url("cetakPengembalian") }}';

      window.location = '{{ url("laporan/laporan_pengembalian") }}';

      var getMirroredWeb = '{{ url("cetakPengembalian") }}';
      var new_web = window.open(getMirroredWeb, "Laporan Pengembalian","menubar=0","location=0","height=500","width=860");
    });

    $('#listBarangLaporan').DataTable();

  	$('#addPeminjaman').hide();
  	$('#contentEdit').hide();
  	$('#rec_pinjam').attr('disabled',true);

  	$('#recordPeminjaman').DataTable();

  	$('#add_pinjam').click(function(){
  		$('#addPeminjaman').slideDown();
	  	$('#contentEdit').hide();
	  	$('#dataPeminjaman').hide();
	  	$('#rec_pinjam').attr('disabled',false);
	  	$(this).attr('disabled',true);

      $('.showBarangHereEdit').html('');
      $('#contentEdit').slideUp();
      xx = 0;
      x = 0;
  	});

  	$('#rec_pinjam').click(function(){
  		$('#addPeminjaman').hide();
	  	$('#contentEdit').hide();
	  	$('#dataPeminjaman').slideDown();
	  	$('#add_pinjam').attr('disabled',false);
	  	$(this).attr('disabled',true);

      $('.showBarangHere').html('');
  	});

    $('#recordPeminjaman').on('click','.editPeminjaman',function(){
      $('#contentEdit').slideDown();

      var id = $(this).closest('tr').find('td:eq(1)').text();
      var url = '{{ url("data/ambilPeminjam") }}'+'/'+id;

      $.get(url,function(show){
        $('.showSiswaHereEdit').html(show);
      });

      var url2 = '{{ url("data/ambilList") }}'+'/'+id;

      $.get(url2,function(x){
        $('.showBarangHereEdit').html(x);
      });

      $('#idPinjam').val(id);

    });

    $('#tutupdit').click(function(){
      $('#contentEdit').slideUp();
    });

  	


  $('#table_barangEdit').on('click','.ambilBarangEdit',function(e){
        
        e.preventDefault();

          var idBarang = $(this).closest('tr').find('td:eq(1)').text();
          if($('#' + idBarang).length == 0){
        
          xx++;

          var idBarang = $(this).closest('tr').find('td:eq(1)').text();
          var namaBarang = $(this).closest('tr').find('td:eq(2)').text();
          var jenisBarang = $(this).closest('tr').find('td:eq(3)').text();
          var statusBarang = $(this).closest('tr').find('td:eq(4)').text();

          var tablebaru = '<tr id="'+idBarang+'">'
            +'<td>'+xx+'.</td>'
            +'<td>'+ idBarang + '</td>' 
            +'<td hidden="true"><input type="text" name="idBarang[]" value="'+idBarang+'"></td>' 
            +'<td>'+ namaBarang + '</td>' 
            +'<td>'+ jenisBarang + '</td>' 
            +'<td>'+ statusBarang + '</td>' 
            +'<td><button type="button" class="hapusBarangEdit">X</button></td>' 
            +'</tr>';

          $('.showBarangHereEdit').append(tablebaru);

          $('#dataBarangEdit').dialog('close');
        }else{
          $('#dataBarangEdit').dialog('close');
        }

      });


  	$('#table_barang').on('click','.ambilBarang',function(e){
  		
  		e.preventDefault();

  			var idBarang = $(this).closest('tr').find('td:eq(1)').text();
  			if($('#' + idBarang).length == 0){
  		
  			x++;

	  		var idBarang = $(this).closest('tr').find('td:eq(1)').text();
	  		var namaBarang = $(this).closest('tr').find('td:eq(2)').text();
	  		var jenisBarang = $(this).closest('tr').find('td:eq(3)').text();
	  		var statusBarang = $(this).closest('tr').find('td:eq(4)').text();

	  		var tablebaru = '<tr id="'+idBarang+'">'
          +'<td>'+x+'.</td>'
          +'<td>'+ idBarang + '</td>' 
          +'<td hidden="true"><input type="text" name="idBarang[]" value="'+idBarang+'"></td>' 
          +'<td>'+ namaBarang + '</td>' 
          +'<td>'+ jenisBarang + '</td>' 
          +'<td>'+ statusBarang + '</td>' 
          +'<td><button type="button" class="hapusBarang">X</button></td>' 
          +'</tr>';

	  		$('.showBarangHere').append(tablebaru);

	  		$('#dataBarang').dialog('close');
  		}else{
  			$('#dataBarang').dialog('close');
  		}

  	});

  	$('.showBarangHere').on('click','.hapusBarang',function(e){
  		e.preventDefault();
  		$(this).closest('tr').remove(); 
		x--;
  	});

    $('.showBarangHereEdit').on('click','.hapusBarangEdit',function(e){
          e.preventDefault();
          $(this).closest('tr').remove(); 
        xx--;
        });

  	$('#btnClearBarang').click(function(){
  		x = 0;
  		$('.showBarangHere').html('');
  	});

    $('#btnClearBarangEdit').click(function(){
          xx = 0;
          $('.showBarangHereEdit').html('');
        });

  	$('#btnAmbilbarang').click(function(){
  		$('#dataBarang').dialog('open');
  	});

    $('#btnAmbilbarangEdit').click(function(){
      $('#dataBarangEdit').dialog('open');
    });

  	$("#lamaPinjam").on("change", function(){
       var date = new Date($("#tanggalSekarang").val()),
           lamaPinjam = parseInt($("#lamaPinjam").val(), 10);
        
        if(!isNaN(date.getTime())){
            date.setDate(date.getDate() + lamaPinjam);
            
            $("#tanggalAkhir").val(date.toInputFormat());
        } else {
            alert("Invalid Date");  
        }
    });


    $("#lamaPinjamEdit").on("change", function(){
       var date = new Date($("#tanggalSekarangEdit").val()),
           lamaPinjam = parseInt($("#lamaPinjamEdit").val(), 10);
        
        if(!isNaN(date.getTime())){
            date.setDate(date.getDate() + lamaPinjam);
            
            $("#tanggalAkhirEdit").val(date.toInputFormat());
        } else {
            alert("Invalid Date");  
        }
    });

     Date.prototype.toInputFormat = function() {
       var yyyy = this.getFullYear().toString();
       var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
       var dd  = this.getDate().toString();
       return yyyy + "-" + (mm[1]?mm:"0"+mm[0]) + "-" + (dd[1]?dd:"0"+dd[0]); // padding
  }

  	$('#table_siswa').on('click','.ambil',function(){
  		var noSiswa = $(this).closest('tr').find('td:eq(1)').text();
  		var namaSiswa = $(this).closest('tr').find('td:eq(2)').text();
  		
  		$('#noSiswa').val(noSiswa);
  		$('#naSiswa').val(namaSiswa);

  		$('#dataSiswa').dialog('close');
  	});

  	 $('#dataSiswa').dialog({
  	 	title: 'Data Siswa',
  	 	autoOpen: false,
  	 	width: 600,
  	 	height: 400,
  	 	buttons:{
  	 		'Tutup' : function(){
  	 			$(this).dialog('close');
  	 		}
  	 	}
  	 });

  	 $('#dataBarang').dialog({
  	 	title: 'Data Barang',
  	 	autoOpen: false,
  	 	width: 600,
  	 	height: 400,
  	 	buttons:{
  	 		'Tutup' : function(){
  	 			$(this).dialog('close');
  	 		}
  	 	}
  	 });

     $('#dataBarangEdit').dialog({
      title: 'Data Barang',
      autoOpen: false,
      width: 600,
      height: 400,
      buttons:{
        'Tutup' : function(){
          $(this).dialog('close');
        }
      }
     });

  	 $('#table_peminjaman').DataTable();
     $('#table_peminjaman2').DataTable();
     
  	 $('#listPinjamCari').click(function(){
  	 	$('#dataRecordPeminjaman').dialog('open');
  	 });

  	 $('#table_peminjaman').on('click','.pilihRecordPinjam',function(){
  	 	var code = $(this).closest('tr').find('td:eq(0)').text();
  	 	var noSiswa = $(this).closest('tr').find('td:eq(1)').text();
  	 	var namaSiswa = $(this).closest('tr').find('td:eq(2)').text();
  	 	var tglPinjam = $(this).closest('tr').find('td:eq(3)').text();
  	 	var tglAkhir = $(this).closest('tr').find('td:eq(4)').text();
  	 	
  	 	$('#id_pinjam').val(code);
  	 	$('#no_peminjam').val(noSiswa);
  	 	$('#nama_peminjam').val(namaSiswa);
  	 	$('#tgl_pinjam').val(tglPinjam);
  	 	$('#tgl_akhir').val(tglAkhir);

  	 	$('#dataRecordPeminjaman').dialog('close');

  	 	var location = '{{ url("getListPinjam") }}'+'/'+code;

  	 	$.get(location,function(show){
  	 		$('.showDetailhere').html(show);
  	 	});

  	 });

  	 $('#reseto').click(function(){
  	 	$('.showDetailhere').html('');
  	 	$('#id_pinjam').val('');
  	 	$('#no_peminjam').val('');
  	 	$('#nama_peminjam').val('');
  	 	$('#tgl_pinjam').val('');
  	 	$('#tgl_akhir').val('');
  	 });

  	 $('#dataRecordPeminjaman').dialog({
  	 	title: 'List Peminjam',
  	 	autoOpen: false,
  	 	width: 800,
  	 	height: 500,
  	 	buttons:{
  	 		'Tutup' : function(){
  	 			$(this).dialog('close');
  	 		}
  	 	}
  	 });

  	 $('#doneMessage').dialog({
  	 	title: 'keterangan',
  	 	autoOpen: false,
  	 	buttons:{
  	 		'OK' : function(){
  	 			$(this).dialog('close');
  	 			location.reload();
  	 		}
  	 	}
  	 });

  	$('#table_siswa').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $('#table_barangEdit').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $('#table_barang').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    $('#btnCari').click(function(){
    	$('#dataSiswa').dialog('open');
    });

  });

</script>