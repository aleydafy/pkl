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
                <h1 style="margin-bottom: 180px;">Galeri</h1>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
@endsection

@section('content')
<style type="text/css">
  .show_image img{
    width: 100%;
    height: 40%;
  }

  #image{
    position: relative;
    display: block;
    transition: all 0.3s ease-in-out; 
  }

  .hoverdiv{
    position: relative;
    display: block;
    width: 100%;
    height: 100%;
    background-color: black;
    opacity: 0;
    transition: all 0.3s ease-in-out; 
    transition-delay: 0.3s;
  }

  #image:hover .hoverdiv{
    opacity: 1;
  }
</style>

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
        <form id="form-tambah-edit" name="form-tambah-edit" action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          @csrf
        	<div class="form-group">
        		<input type="file" name="gambar" id="gambar">
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

<a href="javascript:void(0)" class="btn btn-primary add-new" id="create-new"><i class="fa fa-upload"></i> Upload Image</a>
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach ($data as $row)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{asset('images/'.$row->gambar)}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form action="{{ route('galeri.destroy',$row->id) }}" method="POST">
                    <a href="javascript:void(0)" class="btn btn-success edit" id="edit" data-toggle="modal" data-id="{{ $row->id }}">Edit </a>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <a id="delete" data-id="{{ $row->id }}" class="btn btn-danger delete">Delete</a>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

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
            $.get('galeri/' + id + '/edit', function (data) {
                $('#modal-judul').html("Edit Data");
                $('#tombol-simpan').val("edit");
                $('#tambah-edit-modal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#gambar').attr("src", "asset/images/"+gambar);
            })
        });

        $('body').on('click', '#delete', function () {
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            confirm("Are You sure want to delete ?");

            $.ajax({
            type: "DELETE",
            url: "galeri/"+id,
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