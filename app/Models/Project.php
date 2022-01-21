<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function getSupervisorAttribute($value)
    {
        return strtolower($value);
    }
    protected $fillable=[
        "name", 
        "desc", 
        "status", 
        "domain", 
        "supervisor", 
        "repoUrl", 
        "estBudget", 
        "amountSpent", 
        "duration", 
        "liveUrl", 
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class)->withTimestamps();
    }
    public function activities()
    {
       return    $this->hasMany(Activity::class);
    }

}
