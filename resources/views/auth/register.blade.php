<x-layout>

    {{-- PAGINA REGISTRAZIONE --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">

                <form action="{{route('register')}}" class="card p-5 shadow form-main" method="POST">
                    @csrf
                    <h3 class="text-center heading"> Registrati </h3>
                    <div class="mb-3 inputContainer2">
                        <label for="firstName" class="form-label">Nome: </label>
                        <input type="text" name="firstName" id="firstName" class="inputField @error('firstName') is-invalid @enderror">
                        @error('firstName')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="surname" class="form-label">Cognome: </label>
                        <input type="text" name="surname" id="surname" class="inputField @error('surname') is-invalid @enderror">
                        @error('surname')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="city" class="form-label">Città: </label>
                        <input type="text" name="city" id="city" class="inputField @error('city') is-invalid @enderror">
                        @error('city')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="dateBirth" class="form-label">Data di nascita: </label>
                        <input type="date" name="dateBirth" id="dateBirth" class="inputField @error('dateBirth') is-invalid @enderror">
                        @error('dateBirth')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="username" class="form-label">Username: </label>
                        <input type="text" name="name" id="username" class="inputField @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror

                        <label for="password" class="form-label">Password: </label>
                        <input type="password" name="password" id="password" class="inputField @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                        <label for="password_confirmation" class="form-label">Conferma Password: </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="inputField">
                        @error('password_confirmation')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mt-2">
                        <button id="button" type="submit">Registrati</button>
                        <p class="small mt-2">Già registrato? <a href="{{route('login')}}">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>