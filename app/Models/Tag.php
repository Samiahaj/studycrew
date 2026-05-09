<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Tag extends Model
{

use HasFactory;
    protected $fillable = [
    'name',
];
    public function news()
{
    return $this->belongsToMany(News::class);
}
}
