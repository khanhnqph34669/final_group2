<?php
namespace Ductong\BaseMvc\PostModel;

use Ductong\BaseMvc\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $columns = ['Id', 'Title', 'Content'];
    
}