@extends('mahasiswas.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{ route('mahasiswa.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="Nim">nim</label>
                            <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">nama</label>
                            <input type="Nama" name="nama" class="form-control" id="nama" aria-describedby="nama">
                        </div>
                        <div class="form-group">
                            <label for="Tanggal_Lahir">tanggal_Lahir</label>
                            <input type="date" name="tanggal_Lahir" class="form-control" id="tanggal_Lahir" aria-describedby="tanggal_Lahir">
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">jurusan</label>
                            <input type="jurusan" name="jurusan" class="form-control" id="jurusan"
                                aria-describedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="Email">email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">no_handphone</label>

                            <input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone"
                                aria-describedby="no_handphone">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">kelas</label>
                            <select type="kelas" name="kelas_id" class="form-control" id="kelas">
                                @foreach ($kelas as $kls)
                                    <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">foto</label>
                            <input type="file" name="foto" class="form-control"id="no_handphone"aria-describedby="no_handphone">
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
