<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>The Aulab Post</title>

</head>
<body>
    <x-navbar/>

    <div class="min-vh-100">
        {{$slot}}
    </div>

{{-- Footer --}}
    <footer class="container-fluid bg-dark">
        <div class="container">
            <div class="row py-4">
                <div class="col-12 text-center">
                    <p class="text-center text-white mb-0">
                        ©2023 The Aulab Post 
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>