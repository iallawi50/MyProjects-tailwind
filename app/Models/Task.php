<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['body', 'done', 'project_id'];
    use HasFactory;
    public function projects() {
        return $this->belongsTo(Project::class);
    }
}
