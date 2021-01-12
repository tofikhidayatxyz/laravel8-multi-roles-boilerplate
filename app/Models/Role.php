<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Set fillable
     */
    protected $fillable = ['name', 'description'];

    /**
     * Relation to user
     */
    public function users() {
        return  $this->belongsToMany(User::class);
    }
}
