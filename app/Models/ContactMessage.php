<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    /**
 * Bepaalt welke velden
 * ingevuld mogen worden
 * via mass assignment.
 *
 * Deze gegevens komen
 * uit het contactformulier.
 */
     protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
