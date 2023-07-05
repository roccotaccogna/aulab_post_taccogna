<x-layout>

    {{-- PAGINA MODIFICA PROFILO --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">

                <form action="{{route('user.update')}}" class="card p-5 shadow form-main" method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="text-center heading"> Modifica Profilo </h3>
                    <div class="mb-3 inputContainer2">
                        <label for="firstName" class="form-label">Nome: </label>
                        <input type="text" name="firstName" id="firstName" class="inputField @error('firstName') is-invalid @enderror" value="{{Auth::user()->detail->firstName}}">
                        @error('firstName')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="surname" class="form-label">Cognome: </label>
                        <input type="text" name="surname" id="surname" class="inputField @error('surname') is-invalid @enderror" value="{{Auth::user()->detail->surname}}">
                        @error('surname')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="username" class="form-label">Username: </label>
                        <input type="text" name="name" id="username" class="inputField @error('name') is-invalid @enderror" value="{{Auth::user()->name}}">
                        @error('name')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="city" class="form-label">Città: </label>
                        <input type="text" name="city" id="city" class="inputField @error('city') is-invalid @enderror" value="{{Auth::user()->detail->city}}">
                        @error('city')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="dateBirth" class="form-label">Data di nascita: </label>
                        <input type="date" name="dateBirth" id="dateBirth" class="inputField @error('dateBirth') is-invalid @enderror" value="{{Auth::user()->detail->dateBirth}}">
                        @error('dateBirth')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        
                        <button id="button" type="submit">Modifica profilo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>