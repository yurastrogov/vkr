<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Doctorvisit extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'doctorvisits';

    protected $dates = [
        'datetimepriem',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const REZULTATVISIT_SELECT = [
        '1' => 'Выздоровление',
        '2' => 'Улучшение',
        '3' => 'Ухудшение',
        '4' => 'Без перемен',
        '5' => 'ДВН',
        '6' => 'Осмотр',
    ];

    protected $fillable = [
        'idcontractor_id',
        'complaint',
        'objectivestat',
        'treatment',
        'mkb_id',
        'datetimepriem',
        'visitpurpose',
        'rezultatvisit',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const VISITPURPOSE_SELECT = [
        '0' => 'Осмотр для МСЭК',
        '1' => 'Посещение в неотложной форме',
        '2' => 'Медицинский осмотр',
        '3' => 'Диспансеризация',
        '4' => 'Обращение  по заболеванию',
        '5' => 'Обращение с профилактической целью',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function idcontractor()
    {
        return $this->belongsTo(Contragent::class, 'idcontractor_id');
    }

    public function mkb()
    {
        return $this->belongsTo(Mkb::class, 'mkb_id');
    }

    public function getDatetimepriemAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDatetimepriemAttribute($value)
    {
        $this->attributes['datetimepriem'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}