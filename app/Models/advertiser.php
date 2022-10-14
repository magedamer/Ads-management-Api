<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class advertiser extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function ads()
    {
        return $this->belongsTo(Ads::class, 'ad_id');
    }
}
