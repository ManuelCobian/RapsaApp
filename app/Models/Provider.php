<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    
    protected $table = "providers";

    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class, 'user_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'user_id');
    }
}
