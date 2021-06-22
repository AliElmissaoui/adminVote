<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $casts = [
        'option_name' => 'array',
    ];


    protected $fillable = [
        'title',
        'question_type',
      'option_name',

    ];

    public function votes() {
        return $this->belongsTo(vote::class,'foreign_key');
      }
      protected $table = 'questions';
}
