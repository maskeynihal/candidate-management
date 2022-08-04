<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'candidates';

    public static $searchable = [
        'email',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function candidateCandidatePersonalDetails()
    {
        return $this->hasMany(CandidatePersonalDetail::class, 'candidate_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
