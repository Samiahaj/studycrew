<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\News;

class Comment extends Model
{

  use HasFactory;
/**
 * Bepaalt welke velden
 * ingevuld mogen worden
 * via mass assignment.
 */
    protected $fillable = [
        'user_id',
        'news_id',
        'content',
    ];
 /**
 * Relatie tussen comment
 * en gebruiker.
 *
 * Een comment behoort
 * tot één gebruiker.
 */
    public function user()
{
    return $this->belongsTo(User::class);
}
 /**
 * Relatie tussen comment
 * en nieuwsartikel.
 *
 * Een comment behoort
 * tot één nieuwsartikel.
 */
public function news()
{
    return $this->belongsTo(News::class);
}
}
