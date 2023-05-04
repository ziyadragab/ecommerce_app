<?php
namespace App\Http\Traits\Redis;

use App\Http\Traits\Admin\AdTrait;
use Illuminate\Support\Facades\Redis;

trait AdRedis{

    use AdTrait;
    private function setAdsInRedis(){
        $redis=Redis::connection();
        $ads=$this->getAllAd();
        $redis->set('ads',$ads);
        return true;
    }
    private function getAdFromRedis(){
        $redis=Redis::connection();
        $data= $redis->get('{ads}');
        return empty($data)?$this->getAllAd():$data;
    }
}

?>