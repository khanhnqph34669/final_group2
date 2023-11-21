<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class postStatus extends Model
{
    protected $table = 'poststatus';
    protected $columns = ['Id', 'StatusName'];
}
?>