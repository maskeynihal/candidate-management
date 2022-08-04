<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidatePersonalDetail extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'candidate_personal_details';

    protected $dates = [
        'join_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'candidate_id',
        'first_name',
        'middle_name',
        'last_name',
        'emergency_contact_number',
        'join_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function getJoinDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJoinDateAttribute($value)
    {
        $this->attributes['join_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
