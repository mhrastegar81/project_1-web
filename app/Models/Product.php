<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
