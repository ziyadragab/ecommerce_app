<?php
namespace App\Http\Repositories\EndUser;

use App\Models\User;
use App\Http\interfaces\EndUser\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{
    public function registerForm()
    {
       return view('EndUser.pages.register');
    }
    public function register($request)
    {
         $data=$request->validated();
         $data['password']=bcrypt( $request->password);
         User::create($data);
         toast('You Are Created Account Successfully','success');
         return redirect(route('loginForm'));
    }

    public function loginform()
    {
        return view('EndUser.pages.login');

    }
    public function login($request)
    {
        $credintials=$request->only(['email','password']);


       if(auth()->attempt($credintials)){

        return view('EndUser.index');
       }

       return back();
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        toast('You Are Sign Out ','success');
        return redirect(route('index'));
    }

}

?>