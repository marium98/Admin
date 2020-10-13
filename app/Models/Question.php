<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'question_text',
        'answer',
    ];

    public function questionOptions()
    {
        return $this->hasMany(Option::class, 'question_id', 'id');
    }

   /*  public function questionsResults()
    {
        return $this->belongsToMany(Result::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    } */
}