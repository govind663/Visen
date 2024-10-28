<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'meet_our_minds_id',
        'memberName',
        'memberPosition',
        'memberDescription',
        'socialMediaIcon',
        'socialMediaLink',
        'memberProfilePic',
        'status',
        'inserted_by',
        'inserted_at',
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

    // Relationship Between meet_our_minds_id
    public function teamName(){
        return $this->belongsTo(MeetOurMinds::class, 'meet_our_minds_id', 'id');
    }
}
