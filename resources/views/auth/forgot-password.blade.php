<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">

                <form action="{{route('password.request')}}" method="POST" class="card p-5 form-main shadow ">
                    @csrf
                    <h3 class="text-center heading"> Resetta Password </h3>
                    <p class="text-center"> Inserisci il tuo indirizzo email associato al tuo account </p>

                    @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger"> {{$message}} </div>
                   @enderror

                   <div class="mt-2">
                    <button id="button" type="submit"> Conferma </button>
                   </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>