<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class sections extends Model
{
    use HasTranslations;
    public $translatable = ['section_name','description'];

    protected $fillable = [

        'section_name',
        'description',
        'Created_id',
    ];
}
