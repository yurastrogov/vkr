<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contragent extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'contragents';

    public const GENDER_RADIO = [
        '1' => 'Мужской',
        '0' => 'Женский',
    ];

    protected $dates = [
        'berthday',
        'datepasport',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'surname',
        'name',
        'fathername',
        'berthday',
        'gender',
        'address',
        'telephone',
        'snils',
        'insurance_id',
        'polis',
        'insertion_id',
        'spasport',
        'npasport',
        'pasportvudan',
        'datepasport',
        'codepasport',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function idcontractorDoctorvisits()
    {
        return $this->hasMany(Doctorvisit::class, 'idcontractor_id', 'id');
    }

    public function getBerthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBerthdayAttribute($value)
    {
        $this->attributes['berthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    public function insertion()
    {
        return $this->belongsTo(Lpu::class, 'insertion_id');
    }

    public function getDatepasportAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatepasportAttribute($value)
    {
        $this->attributes['datepasport'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}