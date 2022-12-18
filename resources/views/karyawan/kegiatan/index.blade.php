@extends('template.master')
@section('heading', 'Data Kegiatan')
@section('page')
  <li class="breadcrumb-item active">Data Kegiatan</li>
@endsection
@section('content')
    {{-- {{dd(Auth::user()->id)}} --}}
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit"></i>
                Tambah Kegiatan
            </h3>
            </div>
            <div class="card-body pad table-responsive">
                <form action="{{ route('kegiatan-create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" placeholder="Masukkan Nama Kegiatan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kegiatan">Jenis Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" id="jenis_kegiatan" name="jenis_kegiatan" class="form-control @error('jenis_kegiatan') is-invalid @enderror" placeholder="Masukkan Jenis kegiatan">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_kegiatan">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" class="form-control @error('tanggal_kegiatan') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control @error('waktu_mulai') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Selesai <span class="text-danger">*</span></label>
                                <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control @error('waktu_selesai') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                            </div>
                            <input name="id_user" type="hidden" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
        $("#Kegiatan").addClass("active");
        $("#liKegiatan").addClass("menu-open");
        $("#DataGuru").addClass("active");
    </script>
@endsection