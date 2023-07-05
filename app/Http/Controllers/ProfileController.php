<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function profile(){
        return view('user.profile');
    }

    public function edit(User $user){
        return view('user.edit');
    }

    public function update(Request $request, User $user){

        // VALIDATE PER LA MODIFICA PROFILO 
        $request->validate([
            'firstName' => 'required|alpha',
            'surname' => 'required|alpha',
            'name' => ['required',Rule::unique(User::class)],
            'city' => 'required|alpha',
            'dateBirth' => 'required|date|before:' . Carbon::now()->subYears(18)->format('Y-m-d'),
        ]);

        $user = Auth::user()->detail->update([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'city' => $request->city,
            'dateBirth' => $request->dateBirth,
        ]);

        $user = Auth::user()->update([
            'name' => $request->name,
        ]); 

        return redirect(route('user.profile'))->with('status', 'Profilo Modificato Correttamente');
    }
}
