<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Repository extends Model
{
  protected $fillable=[
      'organization',
      'name',
      'description',
      'creation_date',
      'last_commit'
    ];
  
}
