<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $fillable=[
         'file_id',
        'url' ,
        'title' ,
        'textsnippet',
        'htmlsnippet',
        'minwordsmatched' ,
        'viewurl',
        'queryWords',
        'cost',
    ];
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
