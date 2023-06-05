<x-layout>
    <div class="container-fluid p-5 text-center text-dark sfondo">
        <div class="row vh-65 py-5 m-5">
            <h1 class="display-1">
                {{$article->title}}
            </h1>
        </div>
    </div>

    <div class="container my-5 show">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8">
                <img src="{{Storage::url($article->image)}}" alt="" class="img-fluid my-3 card-img-top">
                <div class="text-center">
                    <h2>{{$article->subtitle}}</h2>
                    <div class="my-3 text-muted fst-italic">
                        <p>Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <hr>
                <p>{{$article->body}}</p>
                <div class="text-center">
                    <a href="{{route('article.index')}}" class=" btn button2 my-5">
                       Torna Indietro 
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>