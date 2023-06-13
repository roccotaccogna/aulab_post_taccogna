<x-layout>
    <div class="container-fluid p-5 sfondo text-center text-black">
        <header class="row vh-65 py-5 m-5">
            <h1> The Aulab Post </h1>
        </header>
    </div>

    <div>
        @if (session ('status'))
        <div class="alert alert-success text-center" role="alert">
            {{session('status')}}
          </div>
        @endif
    </div>

    <div>
        @if (session ('status2'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('status2')}}
          </div>
        @endif
    </div>

    <div class="container my-5">
        <div class="row justify-content-around m-auto">
            @foreach($articles as $article)
             <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <a class="small text-muted fst-italic text-capitalize cat" href="{{route('article.byCategory', ['category' => $article->category->id])}}">{{$article->category->name}}</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->created_at->format('d/m/Y')}} da 
                        <a href="{{route('article.authorList', ['user' => $article->user->id])}}" class="card-a2">{{$article->user->name}}</a><br>
                        <a href="{{route('article.show', compact('article'))}}" class="card-a">Leggi</a>
                    </div>
                </div>
             </div>
            @endforeach
        </div>
    </div>
</x-layout>
