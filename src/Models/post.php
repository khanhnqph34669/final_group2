<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $columns = ['Id', 'Title', 'Content', 'ImageUrl', 'Status', 'Created_at', 'AuthorId','Updated_at'];
    
}