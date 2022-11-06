<?php
declare(strict_types=1);

namespace Module\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    protected $fillable = ['name', 'is_active', 'description', 'rating'];



}
