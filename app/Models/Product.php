<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Override fillable property data.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'price', 'image', 'user_id', 'category_id'];

    /**
     * User
     *
     * Get User Uploaded By Product
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Categories
     *
     * Get Categories Uploaded By Product
     *
     * @return object
     */
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * orderDetails
     *
     * Get orderDetails Uploaded By Product
     *
     * @return object
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * reviews
     *
     * Get reviews Uploaded By Product
     *
     * @return object
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Add New Attribute to get image address
    protected $appends = ['image_url'];

    /**
     * Get Added Image Attribute URL.
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): string | null
    {
        if (is_null($this->image) || $this->image === "") {
            return null;
        }

        return url('') . "/images/products/" . $this->image;
    }
}
