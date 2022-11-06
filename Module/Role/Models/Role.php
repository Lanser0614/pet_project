<?php
declare(strict_types=1);

namespace Module\Role\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    public static function factoryForModel(string $modelName)
    {
        $factory = static::resolveFactoryName($modelName);
        return $factory::new();
    }


}
