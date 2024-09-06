<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id',
        "product_name",
        "description",

    ];


    public function sections()
    {
        return $this->belongsTo(Sections::class,'section_id');
    }
}
