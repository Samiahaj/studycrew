<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Tag extends Model
{

use HasFactory;
/**
 * Bepaalt welke velden
 * ingevuld mogen worden
 * via mass assignment.
 */
    protected $fillable = [
    'name',
];

/**
 * Many-to-many relatie
 * tussen tags en
 * nieuwsartikelen.
 *
 * Een tag kan gekoppeld zijn
 * aan meerdere nieuwsartikelen.
 */
    public function news()
{
    return $this->belongsToMany(News::class);
}
}
