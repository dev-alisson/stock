<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Models
 */

use App\Models\User;

/**
 * Log
 */
class Log extends Model
{
    use HasFactory;

    /**
     * Construct
     */
    public function __construct()
    {
        /**
         * Auth
         */
        if (Auth::user()) {
            /**
             * User
             */
            $this->user_id = Auth::user()->id;
        }
    }

    /**
     * User
     */
    public function user()
    {
        /**
         * User
         */
        return User::find($this->user_id);
    }

    /**
     * Info
     */
    public function info(string $action, string $message)
    {
        /**
         * Data
         */
        $this->level = 'info';
        $this->action = $action;
        $this->description = $message;

        /**
         * Save
         */
        $this->save();
    }

    /**
     * Warning
     */
    public function warning(string $action, string $message)
    {
        /**
         * Data
         */
        $this->level = 'warning';
        $this->action = $action;
        $this->description = $message;

        /**
         * Save
         */
        $this->save();
    }

    /**
     * Danger
     */
    public function danger(string $action, string $message)
    {
        /**
         * Data
         */
        $this->level = 'danger';
        $this->action = $action;
        $this->description = $message;

        /**
         * Save
         */
        $this->save();
    }

    /**
     * Critical
     */
    public function critical(string $action, string $message)
    {
        /**
         * Data
         */
        $this->level = 'critical';
        $this->action = $action;
        $this->description = $message;

        /**
         * Save
         */
        $this->save();
    }
}
