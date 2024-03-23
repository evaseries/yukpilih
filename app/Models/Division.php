<?php
namespace App\Models;

use Illuminate\Console\View\Components\Choice;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['choice_id', 'user_id', 'poll_id'];
    public function choice()
    {
        return $this->belongsTo(Choice::class);


    }
}
