<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'desc_ar',
        'desc_en',
        'is_active',
        'company_name',
        'company_age',
        'facebook_url',
        'google_url',
        'instagram_url',
        'twitter_url',
        'parent_id',
        'category_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable')->where('type', '=', 'image');
    }
    public function photos()
    {
        return $this->morphMany('App\Models\Photo', 'photoable')->where('type', '=', 'images');
    }
    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'parent_id');
    }
    public function subUsers()
    {
        return $this->hasMany('App\Models\User', 'parent_id');
    }
}
