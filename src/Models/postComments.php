<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class postComments extends Model
{
    protected $table = 'postcomments';
    protected $columns = ['PostId', 'UserId', 'Comment', 'CreateAt'];
}
?>