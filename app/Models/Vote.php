<?php
namespace App\Models;

use Illuminate\Console\View\Components\Choice;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['choice_id', 'user_id', 'poll_id','division_id'];
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
    public function user()
    {
        return $this->belongsTo(Choice::class);
    }
    public function poll()
    {
        return $this->belongsTo(Choice::class);
    }
    public function division()
    {
        return $this->belongsTo(Choice::class);
    }
}
