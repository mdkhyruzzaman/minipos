<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['group_id', 'name', 'phone', 'email', 'address'];

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function receipts() {
        return $this->hasMany(Receipt::class);
    }
}
