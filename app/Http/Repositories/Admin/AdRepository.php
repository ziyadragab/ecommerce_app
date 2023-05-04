<?php

namespace App\Http\Repositories\Admin;

use App\Http\interfaces\Admin\AdInterface;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\Redis\AdRedis;

class AdRepository implements AdInterface {
use AdRedis,ImageTrait;
    public function index()
    {
     $ads=$this->getAdFromRedis();
     return view('Admin.pages.ad.index',compact('ads'));
        }
    public  function create()
    {
        return view('Admin.pages.ad.create');
    }
    public function store($request)
    {
        $adImage=$this->uploadImage($request->image,$this->adModel::PATH);
        $this->adModel::create([
           'name'=>$request->name,
           'image'=>$adImage,
        ]);

        toast('Ad Created Successfully','success');
        $this->setAdsInRedis();
        return redirect(route('admin.ad.index'));
    }
    public function edit($ad)
    {
        return view('Admin.pages.ad.update',compact('ad'));
    }
    public function update($request, $ad)
    {
      if($request->image){
        $adImage=$this->uploadImage($request->image,$this->adModel,$ad->getRawOriginal('image'));
      }
      $ad->update([
    'name'=>$request->name,
    'image'=>$adImage??$ad->getRawOriginal('image'),
      ]);
       $this->setAdsInRedis();
      toast('Ad Updated Successfully','success');
      return redirect(route('admin.ad.index'));
    }
    public function delete($ad)
    {


         $ad->delete();
         $this->setAdsInRedis();
         toast('Ad Deleted Successfully ','success');
         return back();
    }

}

?>
