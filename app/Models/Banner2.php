<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner2 extends Model
{
    use HasFactory;
    protected $table = 'banners2';
    protected $fillable = ['name', 'foto'];
}
