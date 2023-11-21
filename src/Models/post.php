<?php
namespace Ductong\BaseMvc\Models;

use Ductong\BaseMvc\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $columns = [
        'Title',
        'Content',
        'ImageUrl',
        'Status',
        'CreateAt',
        'author_Id',
        'RejectContent',
        'categoryPost_id'
    ];
    
}