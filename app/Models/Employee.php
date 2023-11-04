<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    use softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'employees';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'div',
        'branch'
    ];

    public function recipient(): HasMany
    {
        return $this->hasMany(Carp::class, 'recipient_id', 'id');
    }

    public function initiator(): HasMany
    {
        return $this->hasMany(Carp::class, 'initiator_id', 'id');
    }
}
