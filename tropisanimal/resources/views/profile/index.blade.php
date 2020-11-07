@extends('layouts.app')

@section('header')
<div style="background-image: url('images/home.png'); height: 400px; 
background-size:cover;
background-position:center;
background-repeat:no-repeat;">
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        @include('layouts.navbar')
           
    </header>
    <section class="site-blocks-cover overflow-hidden bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md-7 align-self-center text-center text-md-left">
            <div class="intro-text">
                <h1 style="margin-bottom: 180px;">Tentang Kami</h1>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection

@section('content')
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
        <form id="form-tambah-edit" name="form-tambah-edit" action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
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
            <textarea name="deskripsi" id="deskripsi"></textarea>
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
<a href="javascript:void(0)" class="btn btn-primary add-new" id="create-new"><i class="fa fa-add"></i> Tambah Profile</a>
<section class="site-section">
    <div class="container">
        <div class="row hover-1-wrap mb-5 mb-lg-0">
          <div class="col-12">
            <div class="row">
            <div class="mb-4 mb-lg-0 col-lg-6 order-lg-2" data-aos="fade-right">
                <a href="#" class="hover-1">
                  <img src="images/1601761977.png" alt="Image" class="img-fluid">
                </a>
              </div>
              <div class="col-lg-5 mr-auto text-lg-left align-self-center order-lg-1" data-aos="fade-left">
                <h2 class="text-black" id="judul">{{ $profileTerbaru['judul'] }}</h2>
                <p class="mb-4">{{ $profileTerbaru['deskripsi'] }}</p>
                <form action="{{ route('profile.destroy',$profileTerbaru['id']) }}" method="POST">
                    <a href="javascript:void(0)" class="btn btn-success edit" id="edit" data-toggle="modal" data-id="{{ $profileTerbaru['id'] }}">Edit </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete" data-id="{{ $profileTerbaru['id'] }}" class="btn btn-danger delete">Delete</a>
                </form>
              </div>
            </div>
            @foreach($data as $row)
            <div class="profile">
              <h2 class="text-black" id="judul">{{ $row->judul }}</h2>
                <p class="mb-4">{{ $row->deskripsi }}</p>
                <form action="{{ route('profile.destroy',$row->id) }}" method="POST">
                    <a href="javascript:void(0)" class="btn btn-success edit" id="edit" data-toggle="modal" data-id="{{ $row->id }}">Edit </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete" data-id="{{ $row->id }}" class="btn btn-danger delete">Delete</a>
                </form>
            </div>
            @endforeach
          </div>
        </div>
    </div>
</section>


@endsection

@section('javascript')
<script type="text/javascript">
  $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

      //TOMBOL TAMBAH DATA
      //jika tombol-tambah diklik maka
        $('#create-new').click(function () {
            $('#tombol-simpan').val("create-post"); //valuenya menjadi create-post
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Data"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });


        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit', function () {
            var id = $(this).data('id');
            $.get('profile/' + id + '/edit', function (data) {
                $('#modal-judul').html("Edit Data");
                $('#tombol-simpan').val("edit");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#urutan').val(data.urutan);
                $('#judul').val(data.judul);
                $('#deskripsi').val(data.deskripsi);
            })
        });

        $('body').on('click', '#delete', function () {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete ?");

            $.ajax({
            type: "DELETE",
            url: "profile/"+id,
            data: {
            "id": id,
            "_token": token,
            },
            success: function (data) {
            $('#msg').html('Customer entry deleted successfully');
            $("#id" + id).remove();
            },
            error: function (data) {
            console.log('Error:', data);
            }
            });
          });

      </script>
@endsection