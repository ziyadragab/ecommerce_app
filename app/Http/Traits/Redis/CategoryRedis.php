<?php
namespace App\Http\Traits\Redis;

use App\Http\Traits\Admin\CategoryTrait;
use Illuminate\Support\Facades\Redis;

trait CategoryRedis{
use CategoryTrait;

private function setCategoriesInRedis(){
      $redis=Redis::connection();
      $categories=$this->getAllCategory();
      $redis->set('categories',$categories);
      return true;
}

private function getCategoryFromRedis(){
    $redis=Redis::connection();
    $data=$redis->get('{categories}');
    return empty($data)? $this->getAllCategory() :$data;
}

}

?>
