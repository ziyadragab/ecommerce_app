<?php
namespace App\Http\Repositories\EndUser;

use App\Http\interfaces\EndUser\HomeInterface;

class HomeRepository implements HomeInterface{

    public function index()
    {
        return view('EndUser.index');
    }
}
?>
