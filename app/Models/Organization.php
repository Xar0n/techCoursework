<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Organization
 * Модель для организации
 * @package App\Models
 * @property string $name
 */
class Organization extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'login',
        'password',
        'employee_id',
    ];

    /**
     * Все сотрудники организации
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'organizations_employees', 'employee_id', 'organization_id');
    }
}
