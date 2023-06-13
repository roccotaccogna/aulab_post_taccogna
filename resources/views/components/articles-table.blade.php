<table class="table table-striped table-hover border table-responsive-sm">
    <thead class="table2">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody class="table3">
        @foreach($articles as $article)
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td class="td">{{$article->subtitle}}</td>
            <td>{{$article->user->name}}</td>
            <td>
                @if(is_null($article->is_accepted))
                    <a href="{{route('article.show', compact('article'))}}" class="btn read">Leggi articolo</a>
                    <a href="{{route('revisor.acceptArticle', compact('article'))}}" class="btn accept">Accetta articolo</a>
                    <a href="{{route('revisor.rejectArticle', compact('article'))}}" class="btn reject"> Rifiuta articolo</a>
                @else
                    <a href="{{route('revisor.undoArticle', compact('article'))}}" class="btn read"> Riporta in revisione</a>
                @endif
            </td> 

        </tr>
        @endforeach
    </tbody>
</table>