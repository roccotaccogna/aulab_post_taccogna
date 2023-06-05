<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">

                <form action="{{route('password.update')}}" method="POST" class="card p-5 form-main shadow ">
                    @csrf
                    <input type="hidden" value="{{$request->route('token')}}" name="token">
                    <h3 class="text-center heading"> Reimposta Password </h3>
                    
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror" value="{{$request->email}}">
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

                   <div class="mt-2">
                    <button id="button" type="submit" name="reset" value="update"> Conferma </button>
                   </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>