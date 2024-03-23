<?php

namespace App\Models;
use app\Models\vote;
use App\Models\Choice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poll extends Model
{
    use HasFactory;
    protected $fillable= ['title', 'description','deadline'];

    public function choices()
      {
        return $this->hasMany(Choice::class);
    }


}
