<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Models
 */

use App\Models\Product;

/**
 * Item
 */
class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Product
     */
    public function product()
    {
        return Product::find($this->product_id);
    }
}
