<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'stock_status',
    ];

    protected $table="products";

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function subCategories()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    public function attributeValue()
    {
        return $this->hasMany(AttributeValue::class,'product_id');
    }

    protected static function boot(){
        parent::boot();
        static::saved(function ($product) {
            if ($product->quantity <= 0) {
                $product->stock_status = 'outofstock';
            } else {
                $product->stock_status = 'instock';
            }
            $product->saveQuietly(); // Save without firing events to prevent recursion
        });
    }

}
