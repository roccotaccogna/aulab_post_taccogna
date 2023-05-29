<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">


                <form action="{{route('login')}}" class="card p-5 shadow" method="POST">
                    @csrf
                    <h3 class="text-center title"> Login </h3>
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
                        <label class="form-label"> Ricordati </label>
                        <input type="checkbox" name="remember">
                    </div>
                    <div class="mt-2">
                        <button class="btn bg-info text-white">Accedi</button>
                        <p class="small mt-2">Non sei registrato? <a href="{{route('register')}}">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>