<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Router extends Model
{
    public function getRouteKeyName()
    {
        return 'loopback';
    }
    protected $guarded = [];

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
