<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = ['name'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
