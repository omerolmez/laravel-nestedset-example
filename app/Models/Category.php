<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    use NodeTrait;
    use LogsActivity;

    protected $parent = 'parent_id';

    protected $fillable = [
        'name',
        '_lft',
        '_rgt',
        'parent_id'
    ];

    protected static $logAttributes = [
        'id',
        'name',
        '_lft',
        '_rgt',
        'parent_id'
    ];
}
