@extends('mahasiswas.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your i
                            nput.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{ route('mahasiswa.update', $Mahasiswa->Nim) }}" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nim">nim</label>
                            <input type="text" name="nim" class="form-control" id="nim" value="{{ $Mahasiswa->nim }}"
                                aria-describedby="nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{ $Mahasiswa->nama }}"
                                aria-describedby="nama">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_Lahir">tanggal_lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                value="{{ $Mahasiswa->tanggal_lahir }}" aria-describedby="tanggal_lahir">
                        </div>
                        {{-- <div class="form-group">
                            <label for="Kelas">Kelas</label>
                            <input type="Kelas" name="Kelas" class="form-control" id="Kelas"
                                value="{{ $Mahasiswa->Kelas }}" aria-describedby="Kelas">
                        </div> --}}
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>
                            <input type="jurusan" name="jurusan" class="form-control" id="jurusan"
                                value="{{ $Mahasiswa->jurusan }}" aria-describedby="jurusan">
                        </div>
                        <div class="form-group">
                            <label for="Email">email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $Mahasiswa->email }}" aria-describedby="email">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">no_handphone</label>

                            <input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone"
                                value="{{ $Mahasiswa->no_handphone }}" aria-describedby="no_handphone">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">kelas</label>
                                <select type="kelas" name="kelas" class="form-control" id="kelas">
                                    @foreach ($kelas as $kls)
                                        <option value="{{$kls->id}}" {{ $Mahasiswa->kelas_id == $kls->id ? 'selected' : ''}}>{{$kls->nama_kelas}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="image">foto</label>
                            <input type="file" class="form-control" required="required" name="foto" value="{{$mahasiswa->foto}}"
                            >
                        </br>
                            <img width="150px" src="{{asset('storage/'.$mahasiswa->foto)}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
