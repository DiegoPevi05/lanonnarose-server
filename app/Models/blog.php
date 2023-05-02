<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

        protected $fillable = [
            'title_es',
            'title_en',
            'subTitle_es',
            'subTitle_en',
            'description_es',
            'description_en',
            'image1',
            'image2',
            'image3',
            'image4',
            'bulletpoints_es',
            'bulletpoints_en'
        ];
}
