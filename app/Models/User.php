<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): string
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Products
     *
     * Get All products uploaded by user
     *
     * @return object Eloquent product object
     */
    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('id', 'desc');
    }

    /**
     * Orders
     *
     * Get All Orders uploaded by user
     *
     * @return object Eloquent Order object
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Reviews
     *
     * Get All Reviews uploaded by user
     *
     * @return object Eloquent Review object
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    /**
     * Addresses
     *
     * Get All Addresses uploaded by user
     *
     * @return object Eloquent Address object
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Roles
     *
     * Get All Roles uploaded by user
     *
     * @return object Eloquent Role object
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
