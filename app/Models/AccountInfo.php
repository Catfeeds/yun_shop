<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountInfo
 * @package App\Models
 * @version July 24, 2018, 5:30 pm CST
 *
 * @property string account
 * @property string mini_appid
 * @property string mini_secret
 */
class AccountInfo extends Model
{
    use SoftDeletes;

    public $table = 'account_infos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'account',
        'mini_appid',
        'mini_secret'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account' => 'string',
        'mini_appid' => 'string',
        'mini_secret' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
