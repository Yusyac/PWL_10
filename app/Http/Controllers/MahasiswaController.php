<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matakuliah;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Models\MataKuliah;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mahasiswas = Mahasiswa::all()
        $mahasiswas = Mahasiswa::with('kelas')->get();
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5); 
        return view('users.Index', compact('mahasiswas', 'posts'),['mahasiswas' => $mahasiswas,'posts' => $posts]); 
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $kelas = Kelas::all();
        return view('users.Create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required',
            'Email' => 'required', 
            'No_Handphone' => 'required', ]);
            
            $image = $request->file('foto');
            if ($image) {
            $image_name = $request->file('foto')->store('images', 'public');
            }

            //Mahasiswa::create($request->all());
            $kelas = Kelas::find($request->get('Kelas'));

            $mahasiswa = new Mahasiswa();
            $mahasiswa->Nim = $request->get('Nim');
            $mahasiswa->Nama = $request->get('Nama');
            $mahasiswa->Foto = $image_name;
            $mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
            $mahasiswa->Jurusan = $request->get('Jurusan');
            $mahasiswa->Email = $request->get('Email');
            $mahasiswa->No_Handphone = $request->get('No_Handphone');
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

            return redirect()->route('mahasiswa.index') ->with('Success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //$List = Mahasiswa::find($Nim);
        $List = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        return view('users.Detail', compact('List'), ['List' => $List]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        //$List = Mahasiswa::find($Nim);
        $List = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all();
        return view('users.Edit', compact('List', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required', ]);

            //Mahasiswa::find($Nim)->update($request->all());
            $kelas = Kelas::find($request->get('Kelas'));

            $mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
            $mahasiswa->Nim = $request->get('Nim');
            $mahasiswa->Nama = $request->get('Nama');
            if ($mahasiswa->Foto && file_exists(storage_path('app/public/' . $mahasiswa->Foto))) {
                Storage::delete('public/' . $mahasiswa->Foto);
            }
            $image_name = $request->file('foto')->store('images', 'public');
            $mahasiswa->Foto = $image_name;
            $mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
            $mahasiswa->Jurusan = $request->get('Jurusan');
            $mahasiswa->Email = $request->get('Email');
            $mahasiswa->No_Handphone = $request->get('No_Handphone');
            $mahasiswa->kelas()->associate($kelas);
            $mahasiswa->save();

            return redirect()->route('mahasiswa.index') ->with('Success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete(); 
        return redirect()->route('mahasiswa.index') -> with('Success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $List = Mahasiswa::where('Nim', 'like', "%" . $keyword . "%")->paginate(5);
        return view('users.Search', compact('List'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function nilai($Nim)
    {
        $List = Mahasiswa::with('kelas', 'matakuliah')->find($Nim);
        return view('users.Nilai', compact('List'));
    }

    public function cetak_pdf($Nim)
    {
        $List = Mahasiswa::find($Nim);
        $pdf = PDF::loadview('users.Cetak_Pdf',compact('List'), ['List' => $List]);
        return $pdf->stream();
    }

}
