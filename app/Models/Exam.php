<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exam extends Model
{
    use HasFactory;

    protected $connection = 'mysql_second';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
