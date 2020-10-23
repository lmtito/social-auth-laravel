<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialProfile extends Model {
    use HasFactory;
    protected $guarded = [];    // Desactiva la protección contra asignación masiva

    public static $allowed = ['facebook', 'twitter', 'google', 'linkedin', 'github', 'gitlab', 'bitbucket'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

