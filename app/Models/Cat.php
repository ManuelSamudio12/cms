<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
}
