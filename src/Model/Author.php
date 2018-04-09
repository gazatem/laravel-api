<?php

namespace Api\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $fillable = [
      'name', 'biography'
  ];

}
