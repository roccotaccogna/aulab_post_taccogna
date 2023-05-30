<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function authorList(User $user){
        $articles = $user->articles;
        return view('article.authorList', compact('user' , 'articles'));
    }

    public function profile(){
        return view('myprofile');
    }
}
