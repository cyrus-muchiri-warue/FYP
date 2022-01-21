<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable=[
        'project_id',
        'chapter',
        'name'
    ];
    public function project()
    {
       return $this->belongsTo(Project::class);
    }
    public function reports()
    {
       return $this->hasMany(Reports::class);
    }
}