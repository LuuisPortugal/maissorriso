<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuLayout extends Model
{
    public function children()
    {
        return $this->hasMany(MenuLayout::class, 'parent_id');
    }
}
