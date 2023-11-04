<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesCarp extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'categories_carp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'carp_id',
        'category_id'
    ];

    public function carp(): HasOne {
        return $this->hasOne(Carp::class, 'id', 'carp_id');
    }

    public function category(): HasOne {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
