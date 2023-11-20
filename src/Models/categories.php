<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class categroryPost extends Model
{
    protected $table = 'posts';
    protected $columns = [
        'Id',
        'Name',
        ];
    
}