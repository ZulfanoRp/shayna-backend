<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'products_id',
        'photo',
        'is_default'
    ];

    protected $hidden = [];

    public function products() {
        return $this->belongsTo(Product::class,'products_id', 'id');
    }

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('storage/', $value)
        );
    }

}
