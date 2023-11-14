<?php
namespace Ductong\BaseMvc\PostModel;

use Ductong\BaseMvc\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content', 'author_id'];
    protected $columns = ['id', 'title', 'content', 'author_id', 'created_at', 'updated_at'];
}