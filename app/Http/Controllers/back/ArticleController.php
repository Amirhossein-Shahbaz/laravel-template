<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(2);
        return view('back.articles.article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('back.articles.create', compact('article', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'min:10'],
            'description' => ['required', 'min:50', 'max:255'],
            'status' => ['required'],
        ]);

        $article = new Article();

        $article = $article->create($request->all());
        $article->categories()->attach($request->category);

        $mes = 'Article posted successfully';
        return redirect()->route('admin.article', compact('article'))->with('message', $mes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('back.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'min:10'],
            'description' => ['required', 'min:50', 'max:255'],
            'status' => ['required'],
        ]);

        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->description = $request->description;
        $article->save();
        $article->categories()->sync($request->category);
        $mes = 'Article posted successfully';
        return redirect()->route('admin.article', compact('article'))->with('message', $mes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        $article->delete();
        $mes = 'Delete has been done successfully';
        return redirect()->route('admin.article', compact('article'))->with('message', $mes);
    }

    public function updatestatus(Article $article)
    {
        // $Status = $user->status;
        if ($article->status == 1) {
            $article->status = 0;
        } else {
            $article->status = 1;
        }
        $article->save();
        $mes = 'Status has been changed successfully';
        return redirect()->route('admin.article', compact('article'))->with('message', $mes);
    }
}
