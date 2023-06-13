        <table class="table table-striped table-hover border table-responsive-sm">
         <thead class="table2">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
            </tr>
         </thead>
            <tbody class="table3">
                  @foreach($roleRequests as $user)
            <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td class="td">{{$user->email}}</td>
            <td>
                @switch ($role)

                   @case('amministratore')
                        <a href="{{route('admin.setAdmin', compact('user'))}}" class="btn read">Attiva ruolo {{$role}}</a>
                        @break

                   @case('revisore')
                        <a href="{{route('admin.setRevisor', compact('user'))}}" class="btn read">Attiva ruolo {{$role}}</a>
                        @break

                   @case('redattore')
                        <a href="{{route('admin.setWriter', compact('user'))}}" class="btn read">Attiva ruolo {{$role}}</a>
                        @break
                @endswitch
            </td>
            </tr>
                 @endforeach
            </tbody>
        </table>