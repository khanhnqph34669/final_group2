<?php 
namespace Ductong\BaseMvc\UserModel;

use Ductong\BaseMvc\Model;

class user extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'password', 'email', 'role'];
    protected $columns = ['id', 'username', 'password', 'email', 'role', 'created_at', 'updated_at'];
}