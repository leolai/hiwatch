<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Log\ErrorCode;

/**
 * App\User
 *
 * @mixin \Eloquent
 */
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    const PLATFORM_ID_FB    = 1;

    //GENDER
    const GENDER_UNKNOW     = 0;
    const GENDER_MAN        = 1;
    const GENDER_WOMEN      = 2;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'avatar',
        'avatar_original',
        'gender',
        'platform',
        'platform_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * 查询一个用户是否存在，不存在则新增
     * @param \stdClass $user
     * @return bool|user Model
     */
    public static function login(\stdClass $user){
        if(!$user->id){
            Log::error(ErrorCode::MISS_FACEBOOK_LOGIN_INFO);
            return false;
        }

        $user = self::where('platform_id', self::PLATFORM_ID_FB)->where('platform', self::PLATFORM_ID_FB)->find();
        if(!$user){
            $userData = [
                'name'              =>  $user->name,
                'nickname'          =>  $user->name,
                'email'             =>  $user->email,
                'avatar'            =>  $user->avatar,
                'avatar_original'   =>  $user->avatar_original,
                'gender'            =>  $user->user['gender'],
                'platform'          =>  self::PLATFORM_ID_FB,
                'platform_id'       =>  $user->id,
                'password'          =>  '',
            ];
            $user = self::create($user);
        }

        return $user;
        
    }

    /**
     * 性别修饰器
     * @param $value
     */
    public function setGenderAttribute($gender)
    {
        $gender = ($gender === 'female') ? self::GENDER_WOMEN : self::GENDER_MAN;
        $this->attributes['gender'] = $gender;
    }
}
