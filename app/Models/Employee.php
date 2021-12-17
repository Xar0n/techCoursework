<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Employee
 * Модель для сотрудника
 * @package App\Models
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 */
class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
    ];

    /**
     * Все организации к которым принадлежит сотрудник
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organizations()
    {
        return $this->hasMany(Organization::class, 'id');
    }
}
