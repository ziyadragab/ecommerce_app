<?php
namespace App\Http\interfaces\EndUser;

interface AuthInterface{
    public function loginForm();
    public function login($request);
    public function registerForm();
    public function register($request);
    public function logout();
}
?>
