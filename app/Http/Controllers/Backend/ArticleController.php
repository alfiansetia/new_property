<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.article.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required|max:150',
            'content'   => 'required|max:65535',
        ]);
        $destinationPath = public_path('uploads/images/');
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 755, true);
        }
        $img = null;
        if ($files = $request->file('image')) {
            $img = 'image_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $img);
        }
        Article::create([
            'user_id'   => auth()->id(),
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'content'   => $request->content,
            'image'     => $img,
        ]);
        return redirect()->route('backend.articles.index')->with('message', 'Success Add Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('backend.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title'     => 'required|max:150',
            'content'   => 'required|max:65535',
        ]);
        $destinationPath = public_path('uploads/images/');
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 755, true);
        }
        $img = $article->getRawOriginal('image');
        if ($files = $request->file('image')) {
            if (!empty($img) && file_exists($destinationPath . $img)) {
                File::delete($destinationPath . $img);
            }
            $img = 'image_' . date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $img);
        }
        $article->update([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title),
            'content'   => $request->content,
            'image'     => $img,
        ]);
        return redirect()->route('backend.articles.index')->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('backend.articles.index')->with('message', 'Success Delete Data!');
    }
}
