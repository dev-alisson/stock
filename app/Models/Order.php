<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Models
 */

use App\Models\User;
use App\Models\Item;

/**
 * Order
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * User
     */
    public function user()
    {
        return User::find($this->user_id);
    }

    /**
     * Items
     */
    public function items()
    {
        return Item::where('order_id', $this->id)->get();
    }

    /**
     * Count
     */
    public function count()
    {
        return Item::where('order_id', $this->id)->count();
    }
}
