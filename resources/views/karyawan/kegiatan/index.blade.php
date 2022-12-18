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
                                <label for="judul">Judul <span class="text-danger">*</span></label>
                                <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul">
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
                                <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="waktu">Waktu <span class="text-danger">*</span></label>
                                <input type="time" id="waktu" name="waktu" class="form-control @error('waktu') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                            </div>
                            <div class="form-group">
                                <label for="foto">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                                <input name="id_user" type="hidden" value="{{ Auth::user()->id }}">
                            </div>
                        </div>
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