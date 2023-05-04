<?php
namespace App\Http\Repositories\Admin;
use App\Http\interfaces\Admin\AdminAuthInterface;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthInterface{

     public function adminLoginForm()
    {
        return view('Admin.pages.login');
    }
    public function adminLogin($request)
    {
        $credentials= $request->only(['email','password']);

        if(auth()->guard('admin')->attempt($credentials)){

          toast('Welcome' . auth('admin')->user()->name, 'success');

            return redirect(route('admin.index'));
        }
       return back();
    }
    public function adminLogout(){

        Auth::logout();
        session()->flush();
        toast('you are Sign Out Successfully','success');
        return redirect(route('admin.loginForm'));
    }
}

?>