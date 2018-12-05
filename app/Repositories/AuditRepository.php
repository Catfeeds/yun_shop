<?php

namespace App\Repositories;

use App\Models\Audit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AuditRepository
 * @package App\Repositories
 * @version July 23, 2018, 2:50 pm CST
 *
 * @method Audit findWithoutFail($id, $columns = ['*'])
 * @method Audit find($id, $columns = ['*'])
 * @method Audit first($columns = ['*'])
*/
class AuditRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'admin_id',
        'audit_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Audit::class;
    }
}
