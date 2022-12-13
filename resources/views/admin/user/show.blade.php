@extends('template.home')
@section('heading')
  {{-- Data Guru {{ $mapel->nama_mapel }} --}}
@endsection
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('guru.index') }}">Guru</a></li>
  {{-- <li class="breadcrumb-item active">{{ $mapel->nama_mapel }}</li> --}}
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('guru.index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kartu ID</th>
                    <th>NIP</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->id_card }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>
                        <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery" data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                            <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                        </a>
                    </td>
                    <td>
                      <a href="{{ route('guru.edit',$data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                      <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                        <form action="{{ route('guru.destroy', $data->id) }}" id="delete{{ $data->id }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="" data-toggle="modal" data-target="#modal-lg-{{$data->id}}" class="btn btn-primary btn-sm mt-2"><i class="nav-icon fas fa-eye"></i> &nbsp; Lihat</a>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@foreach ($guru as $data)
<div class="modal fade" id="modal-lg-{{$data->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row no-gutters ml-2 mb-2 mr-2">
            <div class="col-md-4">
                <img src="{{ asset($data->foto) }}" class="card-img img-details" alt="...">
            </div>
            <div class="col-md-1 mb-4"></div>
            <div class="col-md-7">
                <h5 class="card-title card-text mb-2">Nama : {{ $data->nama_guru }}</h5>
                <h5 class="card-title card-text mb-2">NIP : {{ $data->nip }}</h5>
                <h5 class="card-title card-text mb-2">No Kartu ID : {{ $data->id_card }}</h5>
                <h5 class="card-title card-text mb-2">Guru Mapel : {{ $data->mapel->nama_mapel }}</h5>
                <h5 class="card-title card-text mb-2">Kode Jadwal : {{ $data->kode }}</h5>
                @if ($data->jk == 'L')
                    <h5 class="card-title card-text mb-2">Jenis Kelamin : Laki-laki</h5>
                @else
                    <h5 class="card-title card-text mb-2">Jenis Kelamin : Perempuan</h5>
                @endif
                <h5 class="card-title card-text mb-2">Tempat Lahir : {{ $data->tmp_lahir }}</h5>
                <h5 class="card-title card-text mb-2">Tanggal Lahir : {{ date('l, d F Y', strtotime($data->tgl_lahir)) }}</h5>
                <h5 class="card-title card-text mb-2">No. Telepon : {{ $data->telp }}</h5>
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
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection