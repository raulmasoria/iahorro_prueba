<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mortgage;
use App\Models\Time_comunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {   
        $franjas = Time_comunication::all();
        return view('index',[
            'franjas' => $franjas,
        ]);
    }

    public function store (Request $request)
    {

        $request->validate([
            'name' => ['required','string', 'max:255'],
            'lastname' => ['required','string', 'max:255'],
            'phone' => ['required','string', 'max:10'],
            'email' => ['required','email', 'max:255'],
            'ingresos' => ['required','Numeric'],
            'cantidad' => ['required','Numeric'],
            'hora' => ['required','Numeric'],
        ]);

        //valido si tengo el email de este usuario        
        if (User::where('email', $request->email)->exists()) {
            //Si ya tengo el usuario, lo recupero
            $user = User::where('email', $request->email)->firstOrFail();            
        }  else {
            //guardo el usuario porque no tengo su email
            $user = new User; 

            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            
            $user->save();
        }         

        //Calculo el experto
        $expert = DB::table('experts')
                    ->inRandomOrder()
                    ->first();

        //guardo datos de la hipoteca
        $mortgage = new Mortgage;

        $mortgage->net_income = $request->ingresos;
        $mortgage->requested_amount = $request->cantidad;
        $mortgage->time_id = $request->hora;
        $mortgage->user_id = $user->id;
        $mortgage->expert_id = $expert->id;
        

        $mortgage->save();      

        //recupero franja horaria
        $franja = Time_comunication::where('id',$request->hora)->firstOrFail();

        return view('mostrar-datos',[
            "user" => $user,
            "mortgage" => $mortgage,
            "expert" => $expert,
            "franja" => $franja,
        ]);
    }
}
