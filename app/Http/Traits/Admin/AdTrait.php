<?php
namespace App\Http\Traits\Admin;

use App\Models\Ad;

trait AdTrait{

    private function getAllAd(){
        return Ad::get();
    }

    private $adModel;
    public function __construct(AD $ad){
        $this->adModel=$ad;
    }
}

?>
