<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderPost extends Model
{
    use HasFactory;

    protected $table = "orden_posts";


    public function itemable(){
        return $this->morphTo();
    }
}
