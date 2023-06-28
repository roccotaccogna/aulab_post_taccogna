<x-layout>

    {{-- PAGINA LAVORA CON NOI --}}

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">
                <form action="{{route('careers.submit')}}" class="card p-5 shadow form-main" method="POST">
                    @csrf
                    <h3 class="text-center heading"> Lavora con noi </h3>
                    <div class="mb-3 inputContainer2">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror" value="{{Auth::user()->email}}" readonly>
                        @error('email')
                        <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3 inputContainer2">
                        <label for="role" class="form-label">Scegli il tuo ruolo: </label>
                        <select name="role" class="inputField @error('role') is-invalid @enderror">
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                        @error('role')
                        <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="mb-3 inputContainer2">
                        <label for="msg" class="form-label">Presentati: </label>
                        <textarea cols="30" rows="7" name="message" id="msg" class="inputBody @error('message') is-invalid @enderror" maxlength="150"></textarea>
                        @error('msg')
                        <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button id="button">Invia candidatura</button>
                        <a href="{{route('homepage')}}" class="backHome"> Torna alla Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>