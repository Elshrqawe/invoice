<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Products extends Model
{
    use HasTranslations;
    public $translatable = ['product_name','description'];

    protected $fillable = [

        'product_name',
        'description',
        'section_id',
    ];

    public function sections()
    {
        return $this->belongsTo('\App\Models\sections', 'section_id','id');   //العلاقه مبين موديل -> sections
    }
}
