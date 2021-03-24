<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','collection_path','collection_name','collection_description'];

    public function getRouteKeyName(){
        return 'collection_path';
    }

    public function cards(){
        return $this->hasMany(Card::class);
    }
}
