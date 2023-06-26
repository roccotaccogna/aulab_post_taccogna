<table class="table table-striped table-hover border table-responsive-sm">
    <thead class="table2">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody class="table3">
        @foreach($articles as $article)
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td class="td">{{$article->subtitle}}</td>
            <td>{{$article->category->name ?? 'Non Categorizzato'}}</td>
            <td>
                @foreach($article->tags as $tag)
                    {{$tag->name}},
                @endforeach
            </td> 
            <td>{{$article->created_at->format('d/m/Y')}}</td>

            <td>
                <a href="{{route('article.show', compact('article'))}}" class="btn read">Leggi articolo</a>
                <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning text-white">Modica articolo</a>
                <form action="{{route('article.destroy', compact('article'))}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn reject"> Elimina articolo</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>