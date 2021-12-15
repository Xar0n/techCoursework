<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int employee_id
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
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'equipments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id',
        'room_id',
        'config_item_id',
        'view_id',
        'grade_id',
        'group_id',
        'inventory_number_id',
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
    /**
     * Хранилище
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    /**
     * Сорт
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    /**
     * Вид
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function view()
    {
        return $this->belongsTo(View::class, 'view_id');
    }

    /**
     * Группа
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    /**
     * Конфигарационная единица
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function configItem()
    {
        return $this->belongsTo(ConfigItem::class, 'config_item_id');
    }

    /**
     * Сотрудник
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * Часть полей оборудования
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipmentNum()
    {
        return $this->hasMany('App\Models\EquipmentNum');
    }

    /**
     * Инвентарный номер
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryNumber()
    {
        return $this->belongsTo(InventoryNumber::class, 'inventory_number_id');
    }
}
