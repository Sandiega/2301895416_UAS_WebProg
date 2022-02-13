<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    use HasFactory;
    protected $table ="order";
    protected $guarded = [];

    public function ebook(){
        return $this->belongsTo(ebookModel::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
