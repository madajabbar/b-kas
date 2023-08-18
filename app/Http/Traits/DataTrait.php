<?php
namespace App\Http\Traits;
use App\Models\Category;
use App\Models\Condition;

trait DataTrait{
    public function category(){
        $data = Category::all();
        return $data;
    }
    public function condition(){
        $data = Condition::all();
        return $data;
    }
}
