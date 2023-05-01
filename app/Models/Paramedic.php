<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paramedic extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'paramedics';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_user_id',
        'surname',
        'name',
        'fathername',
        'speciality_id',
        'shedule_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function id_user()
    {
        return $this->belongsTo(User::class, 'id_user_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Medicposition::class, 'speciality_id');
    }

    public function shedule()
    {
        return $this->belongsTo(Shedule::class, 'shedule_id');
    }
}