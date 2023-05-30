<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <form action="{{route('register')}}" class="card p-5 shadow form" method="POST">
                    @csrf
                    <h3 class="text-center title"> Registrati </h3>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Nome: </label>
                        <input type="text" name="firstName" id="firstName" class="form-control @error('firstName') is-invalid @enderror">
                        @error('firstName')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="surname" class="form-label">Cognome: </label>
                        <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror">
                        @error('surname')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="city" class="form-label">Città: </label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="dateBirth" class="form-label">Data di nascita: </label>
                        <input type="date" name="dateBirth" id="dateBirth" class="form-control @error('dateBirth') is-invalid @enderror">
                        @error('dateBirth')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror

                        <label for="username" class="form-label">Username: </label>
                        <input type="text" name="name" id="username" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password: </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                        <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mt-2">
                        <button class="btn bg-info text-white">Registrati</button>
                        <p class="small mt-2">Già registrato? <a href="{{route('login')}}">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>