<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'address_num', 'entrance',
                           'floor', 'appartment', 'reg_number', 'telephone',
                           'is_checked', 'date_of_last_check', 'date_scheduled',
                           'equip_value', 'type', 'notes', 'status', 'inspector'
                         ];

    protected $dates = ['date_of_last_check', 'date_scheduled', 'created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d';



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
