<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name','avater_sm','avater_lg','about_sm','about_more','job_title'];
}
