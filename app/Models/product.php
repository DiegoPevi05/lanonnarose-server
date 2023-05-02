<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

        protected $fillable = [
            'title_es',
            'title_en',
            'name',
            'shortDescription_es',
            'shortDescription_en',
            'description_es',
            'description_en',
            'imageUrl'
        ];
}
