<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'industry_id',
        'categoryName',
        'filterName',
        'productName',
        'productCategoryName',
        'status',
        'inserted_by',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = [
        'inserted_at',
        'modified_at',
        'deleted_at',
    ];

    // ==== Relationship between Industry
    public function industry() {
        return $this->belongsTo(Industry::class, 'industry_id', 'id');
    }
}
