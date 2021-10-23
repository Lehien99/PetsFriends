<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $idRole = 2;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'idRole'=> $idRole,
        ]);
        // upload avatar user
        // if(request()->hasFile('avatar')){
        //     $avatar = request()->file('avatar')->getClientOriginalName();
        //     request()->file('avatar')->storeAs('avatars', $user->id.'/'.$avatar,'');
        //     $user->update(['avatar'=>$avatar]);
        // }
        // return $user;
        if(request()->hasFile('avatar'))
        {
            $file = request()->file('avatar');
            $name = $file->getClientOriginalName();
            $avatar = Str::random(4)."_".$name;
            while(file_exists("upload/avatar/". $avatar))
            {
                $avatar = Str::random(4)."_". $name;
            }
            $file->move("upload/avatar", $avatar);
            $user->update(['avatar'=>$avatar]);
           
        }
        else
        {
            $user->update(['avatar'=>'defaut.png']);
        }
        return $user;
    }
}
