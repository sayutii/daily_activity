@extends('template.master')
@section('heading', 'Data Karyawan')
@section('page')
  <li class="breadcrumb-item active">Data Karyawan</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-plus-square"></i> &nbsp; Tambah Karyawan
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kartu ID</th>
                        <th>No Telepon/Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_karyawan }}</td>
                        <td>{{ $data->id_card }}</td>
                        <td>{{ $data->no_hp }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_karyawan }}" data-gallery="gallery" data-footer='<a href="" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('edit-form', $data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i>
                            <form action="{{ url('/karyawan/delete', $data->id) }}" id="delete{{ $data->id }}" method="post">
                            @csrf
                            @method('delete')
                            </button>
                                <a href="" data-toggle="modal" data-target="#modal-lg-{{$data->id}}" class="btn btn-primary btn-sm mt-2"><i class="nav-icon fas fa-eye"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Data Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('action-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama <span class="text-danger">*</span></label>
                        <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control @error('nama_karyawan') is-invalid @enderror" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="foto">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_card">Nomor Kartu ID <span class="text-danger">*</span></label>
                        <input type="text" id="id_card" name="id_card" maxlength="5" onkeypress="return inputAngka(event)" value="{{ $id_card }}" class="form-control @error('id_card') is-invalid @enderror" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Telepon/HP <span class="text-danger">*</span></label>
                        <input type="text" id="no_hp" name="no_hp" onkeypress="return inputAngka(event)" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No Telepon">
                    </div>
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

@foreach ($karyawan as $item)
<div class="modal fade" id="modal-lg-{{$item->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row no-gutters ml-2 mb-2 mr-2">
            <div class="col-md-4">
                <img src="{{ asset($item->foto) }}" class="card-img img-details" alt="...">
            </div>
            <div class="col-md-1 mb-4"></div>
            <div class="col-md-7">
                <h5 class="card-title card-text mb-2">Nama : {{ $item->nama_karyawan }}</h5>
                <h5 class="card-title card-text mb-2">No Kartu ID : {{ $item->id_card }}</h5>
                @if ($item->jk == 'L')
                    <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                @else
                    <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                @endif
                <h5 class="card-title card-text mb-2">Tempat Lahir : {{ $item->tmp_lahir }}</h5>
                <h5 class="card-title card-text mb-2">Tanggal Lahir : {{ date('l, d F Y', strtotime($item->tgl_lahir)) }}</h5>
                <h5 class="card-title card-text mb-2">No. Telepon : {{ $item->no_hp }}</h5>
            </div>
        </div>
        </div>
        <div class="modal-footer justify-content-between">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@endsection

@section('script')
    @if (Session::has('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data Karyawan Berhasil ditambahkan!!',
        })
    </script>
    @endif
    <script>
        function inputAngka(e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            return false;
            }
        return true;
        }
        
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataKaryawan").addClass("active");
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