<?php

namespace App\Http\Controllers\src\Classes;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    public $timestamps = false;

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
