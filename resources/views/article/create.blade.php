<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('article.store')}}" class="card p-5 shadow" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-center title"> Inserisci Articolo </h3>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo: </label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">SottoTitolo: </label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror">
                        @error('subtitle')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine: </label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                    <div class="alert alert-danger"> {{$message}} </div>
                   @enderror
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria: </label>
                        <select name="category" id="category" class="form-control text-capitalize @error('category') is-invalid @enderror">
                            @foreach($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo: </label>
                        <textarea cols="30" rows="7" name="body" id="body" class="form-control @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mt-2">
                        <button class="btn bg-info text-white">Inserisci Articolo</button>
                        <a href="{{route('homepage')}}" class="btn btn-outline-info"> Torna alla Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>