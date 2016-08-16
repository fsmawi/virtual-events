<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'date_begin',
        'date_end',
        'lat',
        'long'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date_begin', 'date_end'];

    /**
     * Define the relationships with stands.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stands()
    {
        return $this->hasMany('App\Stand');
    }

    /**
     * Scope the query to only include non started events.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotStarted($query)
    {
        return $query->where('date_begin', ">", Carbon::now());
    }

    /**
     * Scope the query to only include started events.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStarted($query)
    {
        return $query->where('date_begin', "<=", Carbon::now())->where('date_end', ">=", Carbon::now());
    }

}
