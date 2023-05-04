<?php
namespace App\Http\Traits\Admin;

use App\Models\AD;

trait AdTrait{

    private function getAllAd(){
        return AD::get();
    }

    private $adModel;
    public function __construct(AD $ad){
        $this->adModel=$ad;
    }
}

?>