<?php

namespace App\Acessors;

trait DefaultAcessors
{
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    public function getFullNameAttribute()
    {
        return $this->title . ' - ' . $this->body;
    }
    
}