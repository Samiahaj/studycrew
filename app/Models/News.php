<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Tag;

class News extends Model
{
   use HasFactory;

   /**
 * Bepaalt welke velden
 * ingevuld mogen worden
 * via mass assignment.
 */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'published_at',
    ];
 
    /**
 * Relatie tussen nieuwsartikel
 * en gebruiker.
 *
 * Een nieuwsartikel behoort
 * tot één gebruiker.
 */
    public function user()
{
    return $this->belongsTo(User::class);
}

/**
 * Relatie tussen nieuwsartikel
 * en reacties.
 *
 * Een nieuwsartikel kan
 * meerdere reacties bevatten.
 */
public function comments()
{
    return $this->hasMany(Comment::class);
}
/**
 * Many-to-many relatie
 * tussen nieuwsartikelen
 * en tags.
 *
 * Een nieuwsartikel kan
 * meerdere tags hebben.
 */
public function tags()
{
    return $this->belongsToMany(Tag::class);
}
}
