<x-layout>

    {{-- PAGINA MODIFICA ARTICOLO --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">

                <form class="card p-5 shadow form-main" action="{{route('article.update', compact('article'))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="text-center heading"> Modifica un articolo </div>

                    <div class="mb-3 inputContainer2">
                        <label for="title" class="form-label">Titolo: </label>
                        <input type="text" name="title" id="title" class="inputField @error('title') is-invalid @enderror" value="{{$article->title}}">
                        @error('title')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>

                    <div class="mb-3 inputContainer2">
                        <label for="subtitle" class="form-label">SottoTitolo: </label>
                        <input type="text" name="subtitle" id="subtitle" class="inputField @error('subtitle') is-invalid @enderror" value="{{$article->subtitle}}">
                        @error('subtitle')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>

                    <div class="mb-3 inputContainer2">
                        <label for="image" class="form-label">Immagine: </label>
                        <input type="file" name="image" id="image" class="inputField @error('image') is-invalid @enderror">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="immagine presente">
                    </div>
                    @error('image')
                    <div class="alert alert-danger"> {{$message}} </div>
                   @enderror

                    <div class="mb-3 inputContainer2">
                        <label for="category" class="form-label"> Categoria: </label>
                        <select name="category" id="category" class="inputField">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($article->category && $category->id == $article->category->id) selected @endif> {{$category->name}} </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="mb-3 inputContainer2">
                        <label for="body" class="form-label">Corpo del testo: </label>
                        <textarea cols="30" rows="7" name="body" id="body" class="inputBody @error('body') is-invalid @enderror">{{$article->body}}</textarea>
                        @error('body')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>

                    <div class="mb-3 inputContainer2">
                        <label for="tags" class="form-label"> Tags: </label>
                        <input name="tags" id="tags" class="inputField @error('tags') is-invalid @enderror" value="{{$article->tags->implode('name', ',')}}">
                        <span class="span"> Dividi ogni tag con una virgola</span>
                    </div>

                    <div class="mt-2">
                        <button id="button" type="submit"> Modifica Articolo </button>
                        <a href="{{route('homepage')}}" class="backHome"> Torna alla Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>