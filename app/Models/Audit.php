<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Audit
 * @package App\Models
 * @version July 23, 2018, 2:50 pm CST
 *
 * @property integer admin_id
 * @property string audit_id
 */
class Audit extends Model
{
    use SoftDeletes;

    public $table = 'audits';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'admin_id',
        'audit_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin_id' => 'integer',
        'audit_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    
}
