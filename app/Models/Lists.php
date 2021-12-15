<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime $date_end
 * @property DateTime $date_start
 * @property DateTime $basis_datetime
 * @property int      $basis
 * @property int      $basis_number
 * @property int      $updated_at
 * @property int      $created_at
 * @property boolean  $in_works
 */
class Lists extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lists';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creator_id', 'date_end', 'date_start', 'basis', 'in_works', 'basis_datetime', 'inventory_reason_id', 'basis_number', 'updated_at', 'created_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_end' => 'datetime', 'date_start' => 'datetime', 'basis' => 'int', 'in_works' => 'boolean', 'basis_datetime' => 'datetime', 'basis_number' => 'int', 'updated_at' => 'timestamp', 'created_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_end', 'date_start', 'basis_datetime', 'updated_at', 'created_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
