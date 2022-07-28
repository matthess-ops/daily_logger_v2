<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'street','street_nr','postcode','phone_number','city',
    ];

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
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];




    public function activities()
    {
        return $this->hasMany(Activities::class,'user_id','user_id');
    }

    public function activityResult()
    {
        return $this->hasMany(ActivityResult::class,'user_id','user_id');
    }



    public function reportResults(){
        return $this->hasMany(ReportResult::class,'user_id','user_id');
    }

    public function questions(){
        return $this->hasMany(Question::class,'user_id','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
