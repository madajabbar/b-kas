<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->hasMany(User::class);
    }
    protected static function booted()
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
