<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public $table = 'options';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'option_text',
        'created_at',
        'updated_at',
        'deleted_at',
        'question_id',
       
    ];

     /* protected $casts = [
        'option_text' => 'array'
    ]; */
 
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
