@extends('template.master')
@section('heading', 'Data Kegiatan')
@section('page')
  <li class="breadcrumb-item active">Data Kegiatan</li>
@endsection
@section('content')

<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <h3 class="card-title">
            Aktivitas Anda
        </h3>
        </div>
        <div class="card-body pad table-responsive">
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Jenis Kegiatan</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                                <th>Gambar</th>
                                <th>keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->judul }}</td>
                                <td>{{ $data->jenis_kegiatan }}</td>
                                <td>{{ $data->waktu }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>
                                    <a href="{{ asset($data->gambar) }}" data-toggle="lightbox" data-title="Foto {{ $data->judul }}" data-gallery="gallery" data-footer='<a href="" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                        <img src="{{ asset($data->gambar) }}" width="130px" class="img-fluid mb-2">
                                    </a>
                                </td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                  {{-- <a href="{{ route('edit-form', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i></a>
                                  <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i></button>
                                    <form action="{{ route('action-delete', $data->id) }}" id="delete{{ $data->id }}" method="post">
                                    @csrf
                                        @method('delete')
                                        <a href="" data-toggle="modal" data-target="#modal-lg-{{$data->id}}" class="btn btn-primary btn-sm mt-2"><i class="nav-icon fas fa-eye"></i></a>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
@section('script')
    @if (Session::has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Kegiatan Berhasil ditambahkan!!',
        })
    </script>
    @endif
    <script>
        $("#Aktivitas").addClass("active");
        $("#liAktivitas").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection