<table class="table table-striped table-hover border table-responsive-sm">
    <thead class="table2">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Q.ta articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>

    <tbody class="table3">
        @foreach($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{$metaInfo->id}}</th>
            <td>{{$metaInfo->name}}</td>
            <td class="td">{{count($metaInfo->articles)}}</td>

            @if($metaType == "tags")
            <td>
                <form action="{{route('admin.editTag',['tag'=>$metaInfo])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" placeholder="Nuovo nome Tag" class="form-control inputForm d-inline @error('name') is-invalid @enderror">
                    <button type="submit" class="btn read">Aggiorna</button>
                </form>
            </td> 

            <td>
                <form action="{{route('admin.deleteTag', ['tag' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn reject">Elimina</button>
                </form>
            </td> 

            @else
            <td>
                <form action="{{route('admin.editCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" placeholder="Nuovo Nome" class="form-control inputForm d-inline @error('name') is-invalid @enderror">
                    <button type="submit" class="btn read">Aggiorna</button>
                </form>
            </td>

            <td>
                <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn reject">Elimina</button>
                </form>
            </td>
            @endif

        </tr>
        @endforeach
    </tbody>
</table>