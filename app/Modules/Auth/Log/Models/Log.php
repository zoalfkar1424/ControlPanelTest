<?php

namespace App\Modules\Auth\Log\Models;
use App\Modules\Auth\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'module',
        'action',
        'user_id',
        'log_type_id',
        'from',
        'to',
    ];

    protected $with = [
        'user',
        'log_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function log_type()
    {
        return $this->belongsTo(LogType::class, 'log_type_id');
    }
}
