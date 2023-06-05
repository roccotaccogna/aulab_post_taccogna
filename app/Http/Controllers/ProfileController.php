<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('auth.login');
    }

    public function profile(){
        return view('user.profile');
    }

    public function edit(User $user){
        return view('user.edit');
    }

    public function update(Request $request, User $user){
        $user = Auth::user()->detail->update([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'city' => $request->city,
            'dateBirth' => $request->dateBirth
        ]);

        return redirect(route('user.profile'))->with('status', 'Profilo Modificato Correttamente');
    }
}
