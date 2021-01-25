<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    const CREATED_AT  = 'createdAt';
    const UPDATED_AT  = 'updatedAt';
    protected $primaryKey = 'todosId';
    protected $table = 'my_todos';

    protected $attributes = [
        'completed' => false
    ];
    //
}
