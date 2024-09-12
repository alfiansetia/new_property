<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Home';
        return view('frontend.index', compact([
            'title',
        ]));
    }

    public function page(Category $category)
    {
        $available = Property::where('category_id', $category->id)
            ->where('status', 'available')->get();
        $unavailable = Property::where('category_id', $category->id)
            ->where('status', 'unavailable')->get();
        $title = 'Property';
        return view('frontend.list', compact([
            'category',
            'available',
            'unavailable',
            'title',
        ]));
    }

    public function property(Property $property)
    {
        $title = 'Property';
        return view('frontend.detail', compact([
            'title',
            'property'
        ]));
    }

    public function article()
    {
        $articles = Article::all();
        $title = 'Article';
        return view('frontend.article', compact([
            'articles',
            'title',
        ]));
    }


    public function article_detail(Article $article)
    {
        $title = 'Article';
        return view('frontend.article_detail', compact([
            'article',
            'title',
        ]));
    }

    public function testimonial()
    {
        $articles = Article::all();
        $title = 'Index2';
        return view('frontend.contact', compact([
            'articles',
            'title',
        ]));
    }

    public function agent()
    {
        $agents = User::where('role', 'user')->get();
        $title = 'Agent';
        return view('frontend.agent', compact([
            'agents',
            'title',
        ]));
    }

    public function message(Request $request, Property $property)
    {
        $this->validate($request, [
            'name'      => 'required|max:50',
            'email'     => 'required|email|max:100',
            'phone'     => 'required|max_digits:15',
            'title'     => 'required|max:50',
            'message'   => 'required|max:200',
        ]);
        Message::create([
            'user_id'       => $property->user_id,
            'property_id'   => $property->id,
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'title'         => $request->title,
            'message'       => $request->message,
        ]);
        return redirect()->back()->with('message', 'Success Send Message!');
    }

    public function comment(Request $request, Article $article)
    {
        $this->validate($request, [
            'comment'   => 'required|max:200',
        ]);
        Comment::create([
            'user_id'       => auth()->id(),
            'article_id'    => $article->id,
            'comment'       => $request->comment,
        ]);
        return redirect()->back()->with('message', 'Success Add Comment!');
    }
}
