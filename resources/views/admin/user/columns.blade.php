@extends('template.master')
@section('heading')
  Data User @foreach ($role as $d => $data) {{ $d }} @endforeach
@endsection
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('user-index') }}">User</a></li>
  @foreach ($role as $d => $data)
    <li class="breadcrumb-item active">{{ $d }}</li>
  @endforeach
@endsection
@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <a href="{{ route('user-index') }}" class="btn btn-default btn-sm"><i class="nav-icon fas fa-arrow-left"></i> &nbsp; Kembali</a>
        </h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                @foreach ($role as $d => $data)
                  @if ($d == 'Karyawan')
                    <th>No Id Card</th>
                  @endif
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          @if ($user->count() > 0)
            @foreach ($user as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-capitalize">{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                  @if ($data->role == 'Karyawan')
                    <td>{{ $data->id_card }}</td>
                  @endif
                <td>
                  <button class="btn btn-danger btn-sm mt-2 swal-confirm" data-id="{{ $data->id }}"><i class="nav-icon fas fa-trash-alt"></i></button>
                  <form action="{{ route('user-delete', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Silahkan Buat Akun Terlebih Dahulu!</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
        $("#MasterData").addClass("active");
        $("#liMasterData").addClass("menu-open");
        $("#DataUser").addClass("active");
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