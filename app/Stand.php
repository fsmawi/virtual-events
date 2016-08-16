<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url',
        'price',
        'event_id',
        'company_id'
    ];

    /**
     * Define the relationship with a company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Define the relationship with a event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Define the relationship with a visitor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitors()
    {
        return $this->hasMany('App\Visitor');
    }

    /**
     * Check if the stand is free.
     *
     * @return bool
     */
    public function isFree()
    {
        return is_null($this->company_id);
    }
}
