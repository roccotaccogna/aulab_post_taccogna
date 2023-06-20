<x-layout>
    {{-- PAGINA DELLA RICERCA --}}
    <div class="container-fluid p-5 text-center text-dark sfondo">
        <div class="row vh-65 py-5 m-5">
            <h1> Risultati ricerca: {{$query}} </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
             <div class="col-12 col-md-5 col-lg-6">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top w-100" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        @if($article->category)
                        <a class="small text-muted fst-italic text-capitalize cat" href="{{route('article.byCategory', ['category' => $article->category->id])}}">{{$article->category->name}}</a>
                        @else
                        <p class="small text-muted fst-italic text-capitalize">Non Categorizzato</p>  
                        @endif                 
                    </div>
                    
                    @if($article->tag)
                    <div class="tags">
                        <p class="badge text-bg-secondary">
                            @foreach($article->tags as $tag)
                              #{{$tag->name}}
                            @endforeach
                        </p>
                    </div>
                    @endif

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