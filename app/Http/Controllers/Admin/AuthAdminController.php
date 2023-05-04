<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\interfaces\Admin\AdminAuthInterface;


class AuthAdminController extends Controller
{
     private $authInterface ;

    public function __construct(AdminAuthInterface $auth)
    {
        $this->authInterface=$auth;
    }


    public function adminLoginForm(){

        return $this->authInterface->adminLoginForm();
    }

    public function adminLogin(LoginRequest $request){
        return $this->authInterface->adminLogin($request);
    }

    public function adminLogout(){
        return $this->authInterface->adminLogout();

    }
}
