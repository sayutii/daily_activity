@extends('template.master')
@section('heading', 'Edit Karyawan')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ url('/karyawan') }}">Karyawan</a></li>
  <li class="breadcrumb-item active">Edit Karyawan</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Karyawan</h3>
      </div>
      <form action="{{ route('action-update', $karyawan->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_guru">Nama Karyawan</label>
                    <input type="text" id="nama_guru" name="nama_guru" value="{{ $karyawan->nama_guru }}" class="form-control @error('nama_guru') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" id="tmp_lahir" name="tmp_lahir" value="{{ $karyawan->tmp_lahir }}" class="form-control @error('tmp_lahir') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $karyawan->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select id="jk" name="jk" class="select2bs4 form-control @error('jk') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L"
                            @if ($karyawan->jk == 'L')
                                selected
                            @endif
                        >Laki-Laki</option>
                        <option value="P"
                            @if ($karyawan->jk == 'P')
                                selected
                            @endif
                        >Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_card">Nomor ID Card</label>
                    <input type="text" id="id_card" name="id_card" class="form-control" value="{{ $karyawan->id_card }}" readonly>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Telpon/HP</label>
                    <input type="text" id="no_hp" name="no_hp" onkeypress="return inputAngka(event)" value="{{ $karyawan->no_hp }}" class="form-control @error('telp') is-invalid @enderror">
                </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Tambahkan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ url('/karyawan') }}";
        });
    });
    $("#MasterData").addClass("active");
    $("#liMasterData").addClass("menu-open");
    $("#DataGuru").addClass("active");
</script>
@endsection