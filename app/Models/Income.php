<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    //
    use HasFactory;

    protected $table = "incomes";

    public $timestamps = false;

    protected $fillable = [
        'amount',
        'description',
        'concept',
        'date',
        'provider_id',
        'created_at',
        'update_at',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
