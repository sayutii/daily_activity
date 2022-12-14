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
                                <td>{{ $data->tanggal }}</td>
                                <td>
                                    <a href="{{ asset($data->gambar) }}" data-toggle="lightbox" data-title="Foto {{ $data->judul }}" data-gallery="gallery" data-footer='<a href="" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                        <img src="{{ asset($data->gambar) }}" width="130px" class="img-fluid mb-2">
                                    </a>
                                </td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                  <button data-toggle="modal" data-target="#modal-lg-{{$data->id}}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i></button>
                                  <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i></button>
                                    <form action="{{ route('action-delete', $data->id) }}" id="delete{{ $data->id }}" method="post">
                                    @csrf
                                        @method('delete')
                                    </form>
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
@foreach ($kegiatan as $item)
<div class="modal fade bd-example-modal-lg" id="modal-lg-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('action-update', $item->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul <span class="text-danger">*</span></label>
                        <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ !empty($item->judul) ? $item->judul : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                        <select id="jenis_kegiatan" name="jenis_kegiatan" class="select2bs4 form-control @error('jenis_kegiatan') is-invalid @enderror">
                            <option value="">Pilih Jenis Kegiatan</option>
                            <option value="L">Test</option>
                            <option value="P">Test</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ !empty($item->tanggal) ? $item->tanggal : '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="waktu">Waktu <span class="text-danger">*</span></label>
                        <input type="time" id="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{ !empty($item->waktu) ? $item->waktu : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                        <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ !empty($item->keterangan) ? $item->keterangan : '' }}">
                    </div>
                        <input name="id_user" type="hidden" value="{{ Auth::user()->id }}">
                </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
      </div>
      </div>
    </div>
</div>
@endforeach
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
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                $(`#delete${id}`).submit();
            }
            })
        });
    </script>
@endsection