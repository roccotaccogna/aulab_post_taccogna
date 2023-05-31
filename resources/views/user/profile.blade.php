<x-layout>

    <div class="card m-5">
        <div class="card-body">
            <h3 class="text-center title m-2"> Il mio Profilo </h3>
          <h6 class="card-subtitle mb-2 text-body-secondary">Nome: {{Auth::user()->detail->firstName}}</h6>
          <h6 class="card-subtitle mb-2 text-body-secondary">Cognome: {{Auth::user()->detail->surname}}</h6>
          <h6 class="card-subtitle mb-2 text-body-secondary">Città: {{Auth::user()->detail->city}}</h6>
          <h6 class="card-subtitle mb-2 text-body-secondary">Data di nascita: {{Auth::user()->detail->dateBirth}}</h6>
          <h6 class="card-subtitle mb-2 text-body-secondary">Username: {{Auth::user()->name}}</h6>
          <h6 class="card-subtitle mb-2 text-body-secondary">Email: {{Auth::user()->email}}</h6>
        </div>
      </div>
</x-layout>