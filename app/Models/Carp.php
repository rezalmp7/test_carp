<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carp extends Model
{
    use HasFactory;
    use softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'carp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'carp_code',
        'initiator_id',
        'recipient_id',
        'verified_by',
        'due_date',
        'effectiveness',
        'status_date',
        'stage',
        'status'
    ];

    public function initiator(): HasOne {
        return $this->hasOne(Employee::class, 'id', 'initiator_id');
    }

    public function recipient(): HasOne {
        return $this->hasOne(Employee::class, 'id', 'recipient_id');
    }

    public function recipientCommercial(): HasMany {
        return $this->hasMany(Employee::class, 'id', 'recipient_id')->where('div', '=', 'COMMERCIAL')->first();
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'categories_carp');
    }
}
