<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <form action="{{route('user.update')}}" class="card p-5 shadow form" method="POST">
                    @csrf
                    @method('PUT')
                    <h3 class="text-center title"> Modifica Profilo </h3>
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
                    <div class="mt-2">
                        <button class="btn bg-info text-white" type="submit">Modifica profilo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>