<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shedule extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'shedules';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'worktimestart',
        'worktimeend',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function sheduleParamedics()
    {
        return $this->hasMany(Paramedic::class, 'shedule_id', 'id');
    }

    public function workdays()
    {
        return $this->belongsToMany(Workday::class);
    }
}