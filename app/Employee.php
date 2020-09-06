<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Employee
 * @package App
 */
class Employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_employee';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'idfk_company', 'email', 'phone', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function company ()
    {
        return $this->belongsTo('App\Company', 'idfk_company', 'id_company');
    }
}
