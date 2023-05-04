<?php
namespace App\Http\interfaces\Admin;
interface ProductInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($product);
    public function update($request,$product);
    public function delete($product);

}

?>