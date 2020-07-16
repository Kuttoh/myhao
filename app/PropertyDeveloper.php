<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDeveloper extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'developers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
