<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\interfaces\Admin\HomeInterface;
use App\Http\Requests\Admin\Auth\AdminLoginRequest;

class HomeController extends Controller
{
    private $homeInterface ;

    public function __construct(HomeInterface $home)
    {
        $this->homeInterface=$home;
    }


    public function index(){
     return $this->homeInterface->index();
    }
  
}
