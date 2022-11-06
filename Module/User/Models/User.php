<?php
declare(strict_types=1);

namespace Module\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Module\Shop\Models\Shop;


class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN_ROLE = 'ADMIN';
    const SELLER_ROLE = 'SELLER';
    const USER_ROLE = 'USER';


    const UNAUTHORISED_ERROR = [
        "error_message" => "UNAUTHORISED_ERROR",
        "code" => 401
    ];

    const WRONG_PASSWORD_ERROR = [
        "error_message" => "WRONG_PASSWORD",
        "code" => 600
    ];

    const HAVA_NOT_STORE_ERROR = [
        "error_message" => "HAVA_NOT_STORE_ERROR",
        "code" => 700
    ];

    public static function getRoles(): array
    {
        return [
            self::ADMIN_ROLE,
            self::SELLER_ROLE,
            self::USER_ROLE
        ];
    }

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function shops(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this
            ->belongsToMany(Shop::class,
                'user_shops', 'user_id', 'shop_id');

    }

}
