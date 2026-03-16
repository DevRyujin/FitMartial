<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEntry extends Model
{
    use HasFactory;  // this is for the factory, not related to database timestamps
                    // This lets Laravel create fake/test data later.
    protected $fillable = [
        'training_date',
        'activity',
        'notes',
        'color',
    ];

    protected $casts = [                // this is for the Eloquent model, not related to database migrations
        'training_date' => 'date',      // This means Laravel automatically treats:
                                        // - the 'training_date' field as a date object when you access it in your code,
                                        // - and when you save a date to it, Laravel will handle the conversion to the correct format for the database.
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
