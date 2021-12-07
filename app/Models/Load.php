<?php

namespace App\Models;

use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'weight',
    ];

    public function points()
    {
        return $this->hasMany(Point::class);
    }

}
