<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


class UsersController extends Controller
{
    public function index(){
        $user=User::all();
        $Students= $user->where('role','Student');
        $Coches= $user->where('role','coches');
        $user =$user->where('role','Admin');

        return view ('users',['c'=>$user,'s'=>$Students,'ch'=>$Coches]);
    }

    public function add(Request $requset){
        $user=new User();
        $user->F_name=$requset->f_name;
        $user->L_name=$requset->l_name;
        $user->phone=$requset->phone;
        $user->birthdate=$requset->birthdate;
        $user->gender=$requset->gender;
        $user->email=$requset->email;
        $user->password=$requset->password;
        // if(Auth::user()->hasPermission('changeRole'))s
        $user->role=$requset->role;//
        $user->save();
        return redirect('/users');
    }

    public function show ($id){
        $user = User::findorfail($id);
        return view('userProfile',["user"=>$user]);

    }


    public function update (Request $requset,$id){
        $user = User::findorfail($id);
        $user->F_name=$requset->f_name;
        $user->L_name=$requset->l_name;
        $user->phone=$requset->phone;
        $user->birthdate=$requset->birthdate;
        $user->gender=$requset->gender;
        $user->email=$requset->email;
        $user->password=$requset->password;
        $user->is_deleted=$requset->isDeleted;
        $user->save();
        return redirect()->back();
    }
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3']
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 401);
        }
       $user = User::where('email',$request->email)->first();

       if (!$user || !Hash::check($request->password , $user->password))
        {
        return response([
            'message' => 'Email or Password Incorrect'
        ], 401);
       }

       $token = $user->createToken('API Auth')->plainTextToken;
       $response = [
        'user'=> $user->withoutRelations() ,
        'token'=> $token
       ];
       return response($response , 200);
    }

    public function register (Request $request){
        $request->validate([
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'bday' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:3'],
        ]);

        $user = User::create([
            'F_name' => $request->f_name,
            'L_name' => $request->l_name,
            'birthdate' => $request->bday,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));//
        Auth::login($user);

        $token = $user->createToken('auth-token')->plainTextToken;
        $response = [
         'user'=> $user->withoutRelations() ,
         'token'=> $token
        ];
        return response($response , 200);
    }





    public function Logout (Request $request)
    {
        auth()->user()->currentAccessToken()->delete();
        return [
            'message' => 'user logged out'
        ];
    }

}