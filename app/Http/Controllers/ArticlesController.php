<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\User;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articles()
    {
        $articles = Article::paginate(5);

        foreach ($articles as $k => $article){
            $admin = User::select('name')->where('id', $article->admin_id)->first();

            $article->adminName = $admin->name;
        }

        $title = 'Articles';

        return view('articles', compact('title', 'articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function article($id)
    {
        $article = Article::where('id', $id)->first();

        $admin = User::select('name')->where('id', $article->admin_id)->first();

        $article->adminName = $admin->name;

        $title = $article->name;

        return view('article', compact('title', 'article'));
    }
}
