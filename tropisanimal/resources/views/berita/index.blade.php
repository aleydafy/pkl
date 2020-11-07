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
                <h1 style="margin-bottom: 180px;">Berita</h1>
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
        <form id="form-tambah-edit" name="form-tambah-edit" action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          @csrf
        	<div class="form-group">
        		<input type="file" name="gambar" id="gambar">
          </div>
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control">
          </div>
          <div class="form-group">
            <label for="konten">Content</label>
            <textarea name="konten" id="konten"></textarea>
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
<a href="javascript:void(0)" class="btn btn-primary add-new" id="create-new"><i class="fa fa-upload"></i> Upload Berita</a>
<section class="site-section">
    <div class="container">
      <div class="row hover-1-wrap mb-5 mb-lg-0">
          <div class="col-12">
            <div class="row">
              <div class="mb-4 mb-lg-0 col-lg-6"  data-aos="fade-left">
                <a href="#" class="hover-1">
                  <img src="{{ asset('images/'.$beritaTerbaru->gambar) }}" alt="Image" class="img-fluid">
                </a>
              </div>
              <div class="col-lg-5 ml-auto align-self-center"  data-aos="fade-right">
                <h2 class="text-black" id="judul">{{ $beritaTerbaru['judul'] }}</h2>
                <p class="mb-4">{{ $beritaTerbaru['konten'] }}</p>
                <p><a href="#" class="btn btn-primary">Read More</a></p>
                <form action="{{ route('berita.destroy',$beritaTerbaru['id']) }}" method="POST">
                    <a href="javascript:void(0)" class="btn btn-success edit" id="edit" data-toggle="modal" data-id="{{ $beritaTerbaru['id'] }}">Edit </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete" data-id="{{ $beritaTerbaru['id'] }}" class="btn btn-danger delete">Delete</a>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

<section class="site-section " id="services-section">
    <div class="container">
        <div class="row justify-content-left" data-aos="fade-up">
            <div class="col-lg-6 text-left heading-section mb-5">
                <h3>Berita Lainnya</h3>
            </div>
        </div>
        <div class="row">
        @foreach($data as $row)
          <div class="col-md-6 mb-4 col-lg-4" data-aos="fade-up" data-aos-delay="">            
            <div class="block_service">
              <img src="{{ asset('images/'.$row->gambar) }}">
              <h3>{{ $row->judul }}</h3>
              <a href="#">{{ $row->konten }}</a>
              <form action="{{ route('berita.destroy',$row->id) }}" method="POST">
                  <a href="javascript:void(0)" class="btn btn-success edit" id="edit" data-toggle="modal" data-id="{{ $row->id }}">Edit </a>
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <a id="delete" data-id="{{ $row->id }}" class="btn btn-danger delete">Delete</a>
              </form>
            </div>
        </div>
        @endforeach
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
            $.get('berita/' + id + '/edit', function (data) {
                $('#modal-judul').html("Edit Data");
                $('#tombol-simpan').val("edit");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#gambar').attr("src", "asset/images/"+gambar);
                $('#judul').val(data.judul);
                $('#konten').val(data.konten);
                
            })
        });

        $('body').on('click', '#delete', function () {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete ?");

            $.ajax({
            type: "DELETE",
            url: "berita/"+id,
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