<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public readonly User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    #RETORNA A VIEW DE REGISTRO 
    
    public function register()
    {
        return view('register');
    }

    #FAZ TODO O PROCESSO DE VALIDAÇÃO E REGISTRO DO USUÁRIO NOVO
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->except('_token'),[
            'email'=>['required','email'] ,
            'name'=>['required','string','min:6'] ,
            'password'=>['required','confirmed', Password::min(8)]
        ]);

        if($validator->fails()){

            return view('register')->with('errors',$validator->errors());
        }
        else{
            $register = $this->user->create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>password_hash($request->input('password'), PASSWORD_DEFAULT)]);

            if($register){
                return redirect()->back()->with('message','Usuário Registrado');
            }


        }
    }
}