<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $guarded = [];
    protected $table = 'quote';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}