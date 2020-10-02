<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];

    protected static $logAttributes = [
        'name',
        'price',
        'category_id'
    ];
}
