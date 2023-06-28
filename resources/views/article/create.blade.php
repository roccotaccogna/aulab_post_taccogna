<x-layout>

    {{-- PAGINA CREAZIONE ARTICOLO --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">
                <form action="{{route('article.store')}}" class="card p-5 shadow form-main" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-center heading"> Inserisci Articolo </h3>
                    <div class="mb-3 inputContainer2">
                        <label for="title" class="form-label">Titolo: </label>
                        <input type="text" name="title" id="title" class="inputField @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3 inputContainer2">
                        <label for="subtitle" class="form-label">SottoTitolo: </label>
                        <input type="text" name="subtitle" id="subtitle" class="inputField @error('subtitle') is-invalid @enderror">
                        @error('subtitle')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3 inputContainer2">
                        <label for="image" class="form-label">Immagine: </label>
                        <input type="file" name="image" id="image" class="inputField @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger"> {{$message}} </div>
                   @enderror
                    <div class="mb-3 inputContainer2">
                        <label for="category" class="form-label">Categoria: </label>
                        <select name="category" id="category" class="inputField text-capitalize @error('category') is-invalid @enderror">
                            @foreach($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3 inputContainer2">
                        <label for="body" class="form-label">Corpo del testo: </label>
                        <textarea cols="30" rows="7" name="body" id="body" class="inputBody @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3 inputContainer2">
                        <label for="tags" class="form-label">Tags: </label>
                        <input type="text" name="tags" id="tags" class="inputField @error('tags') is-invalid @enderror" value="{{old('tags')}}">
                        <span class="span">Dividi ogni tag con una virgola</span>
                    </div>
                    <div class="mt-2">
                        <button id="button">Inserisci Articolo</button>
                        <a href="{{route('homepage')}}" class="backHome"> Torna alla Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>