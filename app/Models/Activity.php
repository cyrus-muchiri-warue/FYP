<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable=['title','project_id','description'];
    protected $gaurded=[];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
