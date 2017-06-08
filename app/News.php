<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use Searchable;
    use SoftDeletes;
    use RecordsActivity;
}
