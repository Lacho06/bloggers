<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    //metodo para obtener la url
    public function getImageUrl(){
        if(empty($this->url)){
            return asset('img/img-perfil-default.png');
        }
        return Storage::url($this->url);
    }


    public function imageable(){
        return $this->morphTo();
    }

}
