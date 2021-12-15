<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $room_id
 * @property int $config_item_id
 * @property int $view_id
 * @property int $grade_id
 * @property int $group_id
 */
class Equipment extends Model
{
    use HasFactory;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'room_id',
        'config_item_id',
        'view_id',
        'grade_id',
        'group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];



    // Scopes...

    // Functions ...

    // Relations ...
}