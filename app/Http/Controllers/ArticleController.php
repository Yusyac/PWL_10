<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        if ($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }

        Article::create([
            'Title' => $request->title,
            'Content' => $request->content,
            'Featured_Image' => $image_name,
        ]);
        return 'Artikel berhasil disimpan';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.Edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->Title = $request->title;
        $article->Content = $request->content;

        if($article->Featured_Image && file_exists(storage_path('app/public/'. $article->Featured_Image))){
        Storage::delete('public/'.$article->Featured_Image);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $article->Featured_Image = $image_name;

        $article->save();
        return 'Artikel Berhasil Diubah';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function cetak_pdf()
    {
        $article = Article::all();
        $pdf = PDF::loadview('articles.Articles_Pdf', ['article' => $article]);
        return $pdf->stream();
    }
}
