<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle','description', 'length', 'tags', 'requirments', 'requester_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
