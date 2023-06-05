<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div3">

                <h1> Verifica email </h1>
                <p> Devi verificare il tuo indirizzo email per accedere alla pagina </p>
                <form action="{{route('verification.send')}}" method="POST" class="d-line">
                    @csrf
                    <button type="submit" class="btn btn-link"> Clicca qui per rinviare </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>