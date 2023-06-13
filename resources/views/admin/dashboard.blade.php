<x-layout>
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


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"></x-requests-table>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"></x-requests-table>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="text-center">Richieste per ruolo Redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"></x-requests-table>
            </div>
        </div>
    </div>
</x-layout>