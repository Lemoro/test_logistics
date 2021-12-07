<?php

namespace App\Models;

use App\Models\Load;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date', 'load_id',
    ];

    public function loads()
    {
        return $this->belongsTo(Load::class);
    }
}
