<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\News;
use App\Models\Comment;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    /**
 * Bepaalt welke velden
 * ingevuld mogen worden
 * via mass assignment.
 *
 * Extra profielvelden
 * werden toegevoegd:
 * - username
 * - verjaardag
 * - bio
 * - profielfoto
 * - rol
 */
    protected $fillable = [
        'name',
    'username',
    'email',
    'password',
    'birthday',
    'role',
    'bio',
    'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */


    /**
 * Verbergt gevoelige gegevens
 * zodat deze niet zichtbaar zijn.
 */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */


    /**
 * Zet bepaalde gegevens
 * automatisch om naar
 * het correcte datatype.
 */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
 * Relatie tussen gebruiker
 * en nieuwsartikelen.
 *
 * Een gebruiker kan
 * meerdere nieuwsartikelen hebben.
 */
public function news()
{
    return $this->hasMany(News::class);
}

/**
 * Relatie tussen gebruiker
 * en reacties.
 *
 * Een gebruiker kan
 * meerdere reacties plaatsen.
 */
public function comments()
{
    return $this->hasMany(Comment::class);
}


/**
 * Controleert of een gebruiker
 * admin rechten heeft.
 *
 * Retourneert true of false.
 */
public function isAdmin()
{
    return $this->role === 'admin';
}

}
