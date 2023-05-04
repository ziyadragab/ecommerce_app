<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\interfaces\Admin\AdInterface;
use App\Http\Requests\Admin\Ads\StoreAdRequest;
use App\Http\Requests\Admin\Ads\UpdateAdRequest;
use App\Models\AD;

class AdController extends Controller
{
    private $adInterface;
    public function __construct(AdInterface $ad)
    {
        $this->adInterface=$ad;
    }
         public function index()
    {
     return $this->adInterface->index();
    }
    public function create()
    {
        return $this->adInterface->create();
    }
    public function store(StoreAdRequest $request)
    {
        return $this->adInterface->store($request);
    }
    public function edit(AD $ad)
    {

        return $this->adInterface->edit($ad);
    }
    public function update(UpdateAdRequest $request,ad $ad)
    {
       return $this->adInterface->update($request,$ad);
    }
    public function delete(AD $ad)
    {
        return $this->adInterface->delete($ad);
    }


}