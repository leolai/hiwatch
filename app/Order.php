<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    const STATUS_NEW              = 1;
    const STATUS_PROCESS          = 2;
    const STATUS_TRANSPORTATION   = 3;
    const STATUS_REFUND           = 4;//退款
    const STATUS_REISSUE          = 5;//补发
    const STATUS_FINISH           = 6;

    protected $table = 'order';

    public $status = [
        'order.status_new'            =>  self::STATUS_NEW,
        'order.status_process'        =>  self::STATUS_PROCESS,
        'order.status_transportation' =>  self::STATUS_TRANSPORTATION,
        'order.status_refund'         =>  self::STATUS_REFUND,
        'order.status_reissue'        =>  self::STATUS_REISSUE,
        'order.status_finish'         =>  self::STATUS_FINISH,
    ];

    const PAGE_SIZE = 5;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    public static function getByStatus($status = self::STATUS_NEW)
    {
        return self::where('status', $status)->paginate(self::PAGE_SIZE);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
