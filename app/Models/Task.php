<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'priority'];

    // Define any relationships here
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

