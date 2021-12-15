<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property boolean $used
 * @property int $equipment_id
 * @property int $inventory_number_id
 * @property int $reason_writeoff_id
 * @property int $barcode_id
 */
class EquipmentNum extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipments_nums';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'used',
        'equipment_id',
        'reason_writeoff_id',
        'employee_id',
        'barcode_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

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
    /**
     * Часть оборудования
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

    /**
     * Штрих-код
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barcode()
    {
        return $this->belongsTo(Barcode::class, 'barcode_id');
    }

    /**
     * Причина списания
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reasonWriteoff()
    {
        return $this->belongsTo(ReasonWriteoff::class, 'reason_writeoff_id');
    }

    /**
     * Сотрудник использующий оборудование
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
