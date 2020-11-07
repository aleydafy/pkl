@extends('layouts.dashboard')

@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
      <div class="page-header float-left">
          <div class="page-title">
              <h1>Dashboard</h1>
          </div>
      </div>
  </div>
  <div class="col-sm-8">
      <div class="page-header float-right">
          <div class="page-title">
              <ol class="breadcrumb text-right">
                  <li><a href="#">Dashboard</a></li>
                  <li class="active">Profile</li>
              </ol>
          </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-judul" id="modal-judul"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-tambah-edit" name="form-tambah-edit">
          <input type="hidden" name="id" id="id">
          @csrf
        	<div class="form-group">
        		<label for="urutan">Urutan</label>
            <input type="number" name="urutan" id="urutan" class="form-control">
          </div>
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control">
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="tombol-simpan">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- MULAI MODAL KONFIRMASI DELETE-->
<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Delete this data?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                    	<a href="javascript:void(0)" class="btn btn-primary add-new" id="create-new"><i class="fa fa-plus-square"></i> Tambah Profile</a>
                        <table class="table table-striped table-bordered" id="t_profile">
                        	<thead>
								<tr align="center">
									<th>No</th>
									<th>Urutan</th>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th colspan="2">Aksi</th>
								</tr>
							</thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
<script type="text/javascript">
jQuery(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

//TOMBOL TAMBAH DATA
//jika tombol-tambah diklik maka
jQuery('#create-new').click(function () {
    jQuery('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
    jQuery('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
    jQuery('#modal-judul').html("Tambah Data"); //valuenya tambah pegawai baru
    jQuery('#tambah-edit-modal').modal('show'); //modal tampil
});

//Memanggil database ke datatables
jQuery(function () {
    jQuery('#t_profile').DataTable({   
      serverSide: true,
      ajax : {
         url: "{{ route('dashboardProfile.index') }}",
         type: 'GET'
      },
      columns: [
         { data: null, sortable: false, 
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
             } 
         },
         { data: 'urutan', name: 'urutan' },
         { data: 'judul', name: 'judul' },
         { data: 'deskripsi', name: 'deskripsi' },
         { data: 'action', orderable:false, searchable:false } 
      ]
    });
});

//SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
//jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
//jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
if (jQuery("#form-tambah-edit").length > 0) {
    jQuery("#form-tambah-edit").validate({
        submitHandler: function (form) {
            var actionType = jQuery('#tombol-simpan').val();
            jQuery('#tombol-simpan').html('Sending..');

            jQuery.ajax({
                data: jQuery('#form-tambah-edit')
                    .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                url: "{{ route('dashboardProfile.store') }}", //url simpan data
                type: "POST", //karena simpan kita pakai method POST
                dataType: 'json', //data tipe kita kirim berupa JSON
                success: function (data) { //jika berhasil 
                    jQuery('#form-tambah-edit').trigger("reset"); //form reset
                    jQuery('#tambah-edit-modal').modal('hide'); //modal hide
                    jQuery('#tombol-simpan').html('Simpan'); //tombol simpan
                    var oTable = jQuery('#t_profile').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Data Berhasil Disimpan',
                        message: '{{ Session('
                        success ')}}',
                        position: 'bottomRight'
                    });
                    location.reload();
                },
                error: function (data) { //jika error tampilkan error pada console
                    console.log('Error:', data);
                    jQuery('#tombol-simpan').html('Simpan');
                }
            });
        }
    })
}

//TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
//ketika class edit-post yang ada pada tag body di klik maka
jQuery('body').on('click', '.edit', function () {
    var id = jQuery(this).data('id');
    jQuery.get('dashboardProfile/' + id + '/edit', function (data) {
        jQuery('#modal-judul').html("Edit Data");
        jQuery('#tombol-simpan').val("edit");
        jQuery('#tambah-edit-modal').modal('show');
        //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
        jQuery('#id').val(data.id);
        jQuery('#urutan').val(data.urutan);
        jQuery('#judul').val(data.judul);
        jQuery('#deskripsi').val(data.deskripsi);
    })
});

//jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
jQuery(document).on('click', '.delete', function () {
    id = jQuery(this).attr('id');
    jQuery('#konfirmasi-modal').modal('show');
});

//jika tombol hapus pada modal konfirmasi di klik maka
jQuery('#tombol-hapus').click(function () {
    jQuery.ajax({

        url: "dashboardProfile/" + id, //eksekusi ajax ke url ini
        type: 'delete',
        beforeSend: function () {
            jQuery('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
        },
        success: function (data) { //jika sukses
            setTimeout(function () {
                jQuery('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                var oTable = jQuery('#t_profile').dataTable();
                oTable.fnDraw(false); //reset datatable
            });
            iziToast.warning({ //tampilkan izitoast warning
                title: 'Data Berhasil Dihapus',
                message: '{{ Session('
                delete ')}}',
                position: 'bottomRight'
            });
            location.reload();
        }
    })
});
</script>
@endsection