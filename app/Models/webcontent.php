<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webcontent extends Model
{
    use HasFactory;

    protected $table = 'webcontents';

        protected $fillable = [
            'name',
            'content_es',
            'content_en'
        ];
}
