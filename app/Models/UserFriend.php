<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFriend extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        [
            'label' => 'Pending',
            'value' => 'pending',
        ],
        [
            'label' => 'Confirmed',
            'value' => 'confirmed',
        ],
        [
            'label' => 'Blocked',
            'value' => 'blocked',
        ],
    ];

    public $table = 'user_friends';

    protected $appends = [
        'status_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'first_user.name',
        'second_user.name',
        'status',
    ];

    protected $filterable = [
        'id',
        'first_user.name',
        'second_user.name',
        'status',
    ];

    protected $fillable = [
        'first_user_id',
        'second_user_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function firstUser()
    {
        return $this->belongsTo(User::class);
    }

    public function secondUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_SELECT)->firstWhere('value', $this->status)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
