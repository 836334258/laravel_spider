<?php

namespace App\Models;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use ElasticquentTrait;

    protected $guarded=[];


}
