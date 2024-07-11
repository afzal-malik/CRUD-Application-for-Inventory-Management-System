<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category', 'quantity', 'price', 'item_id'];

    public function user(){
        return $this->belongsTo(User::class, 'item_id');
    }
}


