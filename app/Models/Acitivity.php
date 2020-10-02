<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity;

class Acitivity extends Activity
{
    protected $casts = [
        'properties' => 'array',
    ];
}
