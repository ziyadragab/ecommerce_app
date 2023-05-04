<?php
namespace App\Http\Traits\Redis;

use App\Http\Traits\Admin\ProductTrait;
use Illuminate\Support\Facades\Redis;

trait ProductRedis{
    use ProductTrait;

    public function setProductsInRedis(){
        $redis=Redis::connection();
        $products=$this->getAllProduct();
        $redis->set('products',$products);
        return true;
    }
    public function getProductsFromRedis(){
         $redis=Redis::connection();
         $data= $redis->get('{products}');
         return empty($data)?$this->getAllProduct():$data;
    }
}

?>
