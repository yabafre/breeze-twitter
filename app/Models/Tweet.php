<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $user_id
 * @method static where(string $string, $id)
 */
class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
