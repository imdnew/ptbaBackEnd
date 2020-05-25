<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Categorie;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes = DB::table('categories')
            ->join('articles', 'categories.id', '=', 'articles.id_categorie')
            ->select('articles.*', 'categories.libelle')
            ->where('articles.sup', FALSE)
            ->get();
        return view('articles.index', compact('listes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listes = Categorie::where('sup', FALSE)->get();
        return view('articles.create', compact('listes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titre' => 'required',
            'categorie' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $link_image = $request->image->store('public/img/articles');
        } else {
            $link_image = "public/img/articles/default.jpeg";
        }
        Article::create([

            'id_categorie' => $request->categorie,
            'alias' => str_slug($request->titre),
            'title' => $request->titre,
            'description' => $request->description,
            'link_image' => $link_image,

        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listes = Categorie::where('sup', FALSE)->get();

        $article = Article::where('id', $id)->first();
        return view('articles.edit', compact('article', 'listes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titre' => 'required',
            'categorie' => 'required',
            'description' => 'required',
        ]);

        $link_image = $request->link_img;

        if ($request->hasFile('image')) {
            $link_image = $request->image->store('public/img/articles');
        }

        $article = Article::where('id', $id)->first();
        $article->update([

            'id_categorie' => $request->categorie,
            'alias' => str_slug($request->titre),
            'title' => $request->titre,
            'description' => $request->description,
            'link_image' => $link_image,

        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Delete article
     */

    public function delete(Request $request)
    {
        $id = $request->id;
        $article = Article::findOrFail($id);
        $article->update([
            'sup' => 1,
        ]);
    }
}
