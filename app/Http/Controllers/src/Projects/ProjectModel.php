<?php

namespace App\Http\Controllers\src\Projects;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    public $timestamps = false;

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
