<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityResult extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'result', 'date_today','time_slots','main_activities','scaled_activities','scaled_activities_scores'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'time_slots' => 'array',
        'main_activities' => 'array',
        'scaled_activities' => 'array',
        'scaled_activities_scores' => 'array',

    ];





}
