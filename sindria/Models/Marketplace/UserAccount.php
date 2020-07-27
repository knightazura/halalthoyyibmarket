<?php

namespace Sindria\Models\Marketplace;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAccount extends Authenticatable
{
    use Notifiable;

    /**
     * ************************************
     * FUTURE UPDATES!!
     * Change user table name into uncommon one,
     * to prevent easy guessing for attackers
     * ************************************
     * The table associated with the model.
     *
     * @var string
     * protected $table = 'my_flights';
     */

    /**
     * The attribute that mark primary ID isn't an integer value.
     * 
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_type_id', 'username', 'email_adderss', 'password', 'phone_number', 'newsletter_subscription'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'account_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    /**
     * ************************************
     * !!    Relationships start here    !!
     * ************************************
     */
    
    /**
     * The user only bind to one customer
     */
    public function customer()
    {
        return $this->hasOne('Sindria\Models\Marketplace\Customer');
    }
}
