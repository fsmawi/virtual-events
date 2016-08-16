<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'stand_id'
    ];


    /**
     * Define the relationship with a stand.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stand()
    {
        return $this->belongsTo('App\Stand');
    }
}
