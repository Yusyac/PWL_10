@extends('users.layouts')
@section('content')
<div class="container mt-5">
    <div class="col-12 text-center">
        <h3><strong>KARTU HASIL STUDI (KHS)</strong></h3>
    </div>
    <table class="table table-bordered">
            <tr>
                <td><b>Nama</b></td>
                <td>{{$List->Nama}}</td>
            </tr>
            <tr>
                <td><b>Nim</b></td>
                <td>{{$List->Nim}}</td>
            </tr>
            <tr>
                <td><b>Kelas</b></td>
                <td>{{$List->Kelas->Nama_Kelas}}</td>
            </tr>
    </table>
    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
            @foreach ($List->matakuliah as $matakuliah)
                <tr>
                    <td>{{ $matakuliah->Nama_Matkul }}</td>
                    <td>{{ $matakuliah->SKS }}</td>
                    <td>{{ $matakuliah->Semester }}</td>
                    <td>{{ $matakuliah->pivot->Nilai }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection