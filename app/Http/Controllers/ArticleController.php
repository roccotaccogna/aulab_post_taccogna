<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /* FUNZIONE COSTRUTTORE */
    public function __construct(){
        $this->middleware(['auth', 'verified'])->except('index', 'show', 'articleSearch');
    }

    /* FUNZIONE LISTA ARTICOLI */
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /* FUNZIONE CREAZIONE ARTICOLO */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $request->file('image')->store('public/images'),
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
        ]);

        $tags = explode(',', $request->tags);

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('homepage'))->with('status', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /* FUNZIONE MODIFICA ARTICOLO */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' .$article->id,
            'subtitle' => 'required|min:5|unique:articles,subtitle,' .$article->id,
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required'
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
        ]);

        if($request->image){
            Storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images'),
            ]);
        }

        $tags = explode(',', $request->tags);
        $newTags = [];

        foreach($tags as $tag){
            $newTags = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $newTags = $newTags->id;
        }

        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('status', 'Articolo aggiornato correttamente');



    }

    /* FUNZIONE RIMUOVI ARTICOLO */
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('status2', 'Articolo cancellato correttamente');
    }

    /* FUNZIONE GESTIONE PER CATEGORIE */
    public function byCategory(Category $category){
        $articles = $category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.byCategory', compact('category', 'articles'));
    }

    /* FUNZIONE GESTIONE PER REDATTORI */
    public function byWriter(User $user){
        $articles = $user->articles->sortbyDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });

        return view('article.by-user', compact('user', 'articles'));
    }

    /* FUNZIONE RICERCA ARTICOLO */
    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }
}
