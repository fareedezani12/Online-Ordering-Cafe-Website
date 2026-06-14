<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [

        'user_id',
        'membership_level',
        'points',
        'total_spending',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
