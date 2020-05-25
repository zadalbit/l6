<?php

namespace App\Http\Controllers\src\Libraries;

use Illuminate\Database\Eloquent\Model;

class LibraryModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libraries';
    
    public $timestamps = false;

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
