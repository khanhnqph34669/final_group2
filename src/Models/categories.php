<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class Categories extends Model
{
    protected $table = 'category';
    protected $columns = [
        'id',
        'name',
        ];
    
}