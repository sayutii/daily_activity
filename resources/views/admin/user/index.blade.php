@extends('template.master')
@section('heading', 'Data User')
@section('page')
  <li class="breadcrumb-item active">Data User</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <i class="nav-icon fas fa-plus-square"></i> &nbsp; Tambah Data User
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
                        <th>NIP</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($guru as $data) --}}
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_guru }}</td>
                        <td>{{ $data->id_card }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>
                            <a href="{{ asset($data->foto) }}" data-toggle="lightbox" data-title="Foto {{ $data->nama_guru }}" data-gallery="gallery" data-footer='<a href="{{ route('guru.ubah-foto', Crypt::encrypt($data->id)) }}" id="linkFotoGuru" class="btn btn-link btn-block btn-light"><i class="nav-icon fas fa-file-upload"></i> &nbsp; Ubah Foto</a>'>
                                <img src="{{ asset($data->foto) }}" width="130px" class="img-fluid mb-2">
                            </a>
                        </td> --}}
                        {{-- <td>
                          <a href="{{ route('guru.edit',$data->id) }}" class="btn btn-success btn-sm mt-2"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                          <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                            <form action="{{ route('guru.destroy', $data->id) }}" id="delete{{ $data->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="" data-toggle="modal" data-target="#modal-lg-{{$data->id}}" class="btn btn-primary btn-sm mt-2"><i class="nav-icon fas fa-eye"></i> &nbsp; Lihat</a>
                              </form>
                        </td> --}}
                    </tr>
                    {{-- @endforeach --}}
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
          <h4 class="modal-title">Tambah Data Guru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_guru">Nama*</label>
                        <input type="text" id="nama_guru" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir*</label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control @error('tmp_lahir') is-invalid @enderror" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir*</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin*</label>
                        <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telp">Nomor Telpon/HP*</label>
                        <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)" class="form-control @error('telp') is-invalid @enderror" placeholder="No Telepon">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nip">NIP*</label>
                        <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan NIP">
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran*</label>
                        <select id="mapel_id" name="mapel_id" class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                            <option value="">Pilih Mapel</option>
                            @foreach ($mapel as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="id_card">Nomor Kartu ID*</label>
                        <input type="text" id="id_card" name="id_card" maxlength="5" onkeypress="return inputAngka(event)" value="#" class="form-control @error('id_card') is-invalid @enderror" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Jadwal*</label>
                        <input type="text" id="kode" name="kode" maxlength="3" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kode') is-invalid @enderror" placeholder="Masukkan kode">
                    </div>
                    <div class="form-group">
                        <label for="foto">File input*</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
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
        text: 'Data guru berhasil diditambahkan!!',
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
        $("#DataGuru").addClass("active");
    </script>
@endsection