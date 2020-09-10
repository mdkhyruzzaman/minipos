<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['title'];

    public function users() {
        return $this->hasMany(User::class);
    }

    /**
     *  Geting array for select options
     */
    public static function listForSelect() {
        $groups = Self::all();
        $list = [];
        foreach($groups as $group) {
            $list[$group->id] = $group->title;
        }

        return $list;
    }
}
