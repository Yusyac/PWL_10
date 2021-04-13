@extends('mahasiswas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>

            <!-- Form Search -->
            <div class="float-left my-2">
                <form action="{{ route('mahasiswa.index') }}" method="GET">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Cari</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- End Form Search -->

            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal_Lahir</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>No_Handphone</th>
            <th width="280px">Action</th>
            <th>Kelas</th>
        </tr>
        @foreach ($mahasiswas as $Mahasiswa)
            <tr>

                <td>{{ $Mahasiswa->nim }}</td>
                <td>{{ $Mahasiswa->nama }}</td>
                <td><img width="100px" height="100px" src="{{asset('storage/'.$Mahasiswa->foto)}}"></td>
                <td>{{ $Mahasiswa->tanggal_lahir }}</td>
                <td>{{ $Mahasiswa->jurusan }}</td>
                <td>{{ $Mahasiswa->email }}</td>
                <td>{{ $Mahasiswa->no_handphone }}</td>
                <td>
                    <form action="{{ route('mahasiswa.destroy', $Mahasiswa->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('mahasiswa.show', $Mahasiswa->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $Mahasiswa->id) }}">Edit</a>
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <a class="btn btn-warning" href="{{ route('mahasiswa.nilai', $Mahasiswa->id) }}">Nilai</a>

                    </form>
                </td>
                <td>{{ $Mahasiswa->kelas->nama_kelas}}</td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
    </div>
@endsection
