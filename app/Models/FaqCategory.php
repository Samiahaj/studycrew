<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
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
 * Relatie tussen FAQ categorie
 * en FAQ's.
 *
 * Een categorie kan
 * meerdere FAQ's bevatten.
 */
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}