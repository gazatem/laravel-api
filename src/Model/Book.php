<?php

namespace Api\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = ['title', 'summary', 'publish_date', 'author_id'];
}
