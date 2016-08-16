<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'description',
        'logo_url',
        'admin_full_name',
        'admin_email',
        'marketing_document'
    ];

    /**
     * Define the relationship with the stand.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stand()
    {
        return $this->hasOne('App\Stand');
    }
}
