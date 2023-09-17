<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cart(){
        return $this->belongsTo(Cart::class);
    }
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->ulid = Str::ulid();
            } catch (Exception $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
