<?php
declare(strict_types=1);

namespace Module\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


}
