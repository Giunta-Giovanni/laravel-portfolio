<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Project extends Model
{
    //colleghiamo il tipo 
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
