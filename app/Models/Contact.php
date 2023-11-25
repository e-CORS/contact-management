<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'email',
        'phone',
        'address',
        'profilePicture'
    ];

    /**
     * Get the user that created the contact.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
