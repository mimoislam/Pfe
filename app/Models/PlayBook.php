<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayBook extends Model
{
    use HasFactory;


  public function user(): BelongsTo
  {
      return $this->belongsTo(user::class, 'foreign_key', 'other_key');
  }
}
