<x-layout>
    {{-- PAGINA LISTA ARTICOLI --}}
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1> Tutti gli Articoli </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
             <div class="col-12 col-md-5 col-lg-6 col-sm-4">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top w-100" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <a class="small text-muted fst-italic text-capitalize" href="{{route('article.byCategory', ['category' => $article->category->id])}}">{{$article->category->name}}</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->created_at->format('d/m/Y')}} da 
                        <a href="{{route('article.authorList', ['user' => $article->user->id])}}">{{$article->user->name}}</a>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                    </div>
                </div>
             </div>
            @endforeach
        </div>
    </div>
</x-layout>