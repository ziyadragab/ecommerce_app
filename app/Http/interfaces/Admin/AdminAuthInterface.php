<?php
namespace App\Http\interfaces\Admin;

interface AdminAuthInterface{
    public function adminloginForm();
    public function adminLogin($request);
    public function adminLogout();
}

?>