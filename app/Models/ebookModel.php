<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ebookModel extends Model
{
    use HasFactory;

    protected $table ="ebook";
    protected $guarded = [];

    public function product(){
        return $this->hasMany(orderModel::class);
    }
}
