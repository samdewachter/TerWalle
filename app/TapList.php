<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TapList extends Model
{
    use SoftDeletes;
    use RecordsActivity;
}
