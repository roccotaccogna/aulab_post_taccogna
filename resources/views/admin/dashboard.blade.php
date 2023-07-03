<x-layoutARW>
    <div class="container-fluid p-5 sfondo2 text-center text-black">
        <header class="row vh-65 py-5 m-5">
            <h1> Dashboard Amministratore </h1>
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
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"></x-requests-table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"></x-requests-table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"></x-requests-table>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center"> I Tags della piattaforma </h2>
                <x-meta-info :metaInfos="$tags" metaType="tags"></x-meta-info>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center"> Le Categorie della piattaforma </h2>
                <x-meta-info :metaInfos="$categories" metaType="categorie"></x-meta-info>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center"> Nuove Categorie </h2>
                <form action="{{route('admin.storeCategory')}}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="name" class="form-control me-2 inputForm2 @error('name') is-invalid @enderror" placeholder="Inserisci una nuova Categoria">
                    <button type="submit" class="btn accept inpButton">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
</x-layoutARW>