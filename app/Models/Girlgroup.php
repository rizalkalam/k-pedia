<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Girlgroup extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
