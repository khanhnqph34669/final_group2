<?php 
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class users extends Model
{
    protected $table = 'users';
    protected $columns = [ 'Id', 'Name', 'Status', 'Email', 'Phone', 'Password', 'Address', 'roles_id','PathPortFolio'];
}


