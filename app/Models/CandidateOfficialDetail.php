<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateOfficialDetail extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const DESIGNATION_SELECT = [
        'ASE' => 'ASE',
        'SE'  => 'SE',
        'SSE' => 'SSE',
    ];

    public const AREA_SELECT = [
        'Development' => 'Development',
        'Design'      => 'Design',
        'DevOps'      => 'DevOps',
    ];

    public $table = 'candidate_official_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'official_email',
        'area',
        'designation',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
