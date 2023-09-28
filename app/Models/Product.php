<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function condition(){
        return $this->belongsTo(Condition::class);
    }
    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }


    public function scopeUlid($query, $type){
        return $query->where('ulid', $type);
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
