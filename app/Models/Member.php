<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Member extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'charter',
        'medical_certificate',
        'payment',
        'created_at'
    ];
}

