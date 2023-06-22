<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 div2">


                @if (session('status'))
                    <div class="alert alert-success">
                         {{ session('status') }}
                    </div>
                @endif


                <form action="{{route('login')}}" class="card p-5 shadow form-main" method="POST">
                    @csrf
                    <h3 class="text-center heading"> Login </h3>
                    <div class="mb-3 inputContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope inputIcon" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                          </svg>
                        <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email">
                        @error('email')
                         <div class="alert alert-danger"> {{$message}} </div>
                       @enderror
                    </div>
                    <div class="mb-3 inputContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key inputIcon" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>
                        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror inputField" placeholder="Password">
                        @error('password')
                         <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Ricordati </label>
                        <input type="checkbox" name="remember">
                    </div>
                    <div class="mt-2">
                        <button id="button">Accedi</button>
                        <a href="{{route('password.request')}}" class="backHome">Password dimenticata?</a>
                        <a href="{{url('auth/google')}}" class="btn btn-primary">Login with Google
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                              </svg> --}}
                        </a>
                        <p class="small mt-2 backHome">Non sei registrato? <a href="{{route('register')}}">Clicca qui</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>