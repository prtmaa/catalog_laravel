@extends('layouts.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-2">Data Kategori</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

      <div class="row justify-content-between mt-3">
        <div class="col-12 col-md-8 px-5 mb-2">
            <button type="button" onclick="addForm('{{route('kategori.store')}}')" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form-modal">Tambah Data</button>
        </div>    

        <div class="col-12 col-md-4 px-5">
            <form action="" method="get">
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." aria-label="Search..." name="keyword" />
                    <button class="input-group-text" id="basic-addon-search31" type="submit"><i class="bx bx-search"></i></button>
                </div>  
            </form>  
        </div>
      </div>
         
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th width="200px">No</th>
              <th width="500px">Kategori</th>
              <th width="300px">Aksi</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($kategoris as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><strong>{{$item->nama_kategori}}</strong></td>
                <td>
                    <div class="demo-inline-spacing">
                        <button type="button" onclick="editForm('{{route('kategori.update', $item->id )}}')" class="btn btn-icon btn-sm btn-primary"  data-toggle="modal" data-target="#form-modal">
                          <span class="tf-icons bx bx-pen"></span>
                        </button>
                        <button type="button" onclick="deleteData('{{route('kategori.destroy', $item->id)}}')" class="btn btn-icon btn-sm btn-danger">
                          <span class="tf-icons bx bx-trash"></span>
                        </button>
                    </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="px-5 mt-5">
            {{$kategoris->withQueryString()->links()}}
        </div>
      </div>
    </div>
    
    @include('kategori.form')
    @include('kategori.delete')

@endsection


@push('js')
    <script>
        setTimeout(() => {
            $('.alert').fadeOut();
            }, 3000);

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Slider');
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('post');
            $('#modal-form [name=nama_kategori]').focus();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Slider');
            $('#modal-form form').attr('action', url);
            $('#modal-form [name=_method]').val('put');
            $('#modal-form [name=nama_kategori]').focus();
        $.get(url)
            .done((response) => {
                $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
         }

         function deleteData(url) {
            $('#modal-delete').modal('show');
            $('#modal-delete form').attr('action', url);
            $('#modal-delete [name=_method]').val('delete');
        }
    </script>
@endpush