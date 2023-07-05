<x-layoutARW>
    <div class="container-fluid p-5 sfondo2 text-center text-black">
        <header class="row vh-65 py-5 m-5">
            <h1 class="text-white"> Dashboard Redattore {{Auth::user()->name}} </h1>
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
                <h2 class="text-center"> Articoli in fase di revisione </h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"></x-writer-articles-table>
            </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center"> Articoli pubblicati </h2>
                <x-writer-articles-table :articles="$acceptedArticles"></x-writer-articles-table>
            </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center"> Articoli respinti </h2>
                <x-writer-articles-table :articles="$rejectedArticles"></x-writer-articles-table>
            </div>
    </div>

</x-layoutARW>