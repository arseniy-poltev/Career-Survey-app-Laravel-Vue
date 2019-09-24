<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'paid'
    ];
    //protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function getSummaryFilename( $prefix = '' )
    {
        return storage_path('app') . '/reports/summary/' . $prefix . $this->getHash() . '.pdf';
    }

    public function getFullFilename( $prefix = '' )
    {
        return storage_path('app') . '/reports/full/' . $prefix . $this->getHash() . '.pdf';
    }
}
