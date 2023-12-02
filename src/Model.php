<?php

namespace Ductong\BaseMvc;

class Model
{
    protected $conn;
    protected $table;

    protected $columns;

    public function __construct()
    {
        try {
            $host = DB_HOST;
            $dbname = DB_DATABASE;
            $username = DB_USERNAME;
            $password = DB_PASSWORD;

            $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function all($column = 'id')
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$column} DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function paginate($page = 1, $perPage = 10)
    {
        $sql = "SELECT * FROM {$this->table} LIMIT {$perPage} OFFSET (({$page} - 1) * {$perPage})";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table}";

        $columns = implode(", ", $this->columns);
        $sql .= "({$columns}) VALUES ";

        $values = [];
        foreach ($this->columns as $column) {
            $values[] = ":{$column}";
        }
        $values = implode(", ", $values);
        $sql .= "({$values})";

        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->columns)) {
                $stmt->bindParam(":{$key}", $value);
            }
        }

        $stmt->execute();
    }

    /* 
        $data = [
            'collumn_name' => 'giá trị người dùng truyền vào',
        ];

        $conditions = [
            ['collumn_name', 'toán tử so sánh', 'giá trị người dùng truyền vào', 'AND hoặc OR'],
            ['collumn_name', 'toán tử so sánh', 'giá trị người dùng truyền vào']
        ];
    */
    public function update($data, $conditions = [])
    {
        $sql = "UPDATE {$this->table} SET ";

        $sets = [];
        foreach ($this->columns as $column) {
            $sets[] = "{$column} = :{$column}";
        }
        $sets = implode(", ", $sets);
        $sql .= "{$sets}";

        $where = [];
        foreach ($conditions as $condition) {
            $link = $condition[3] ?? '';
            $where[] = "{$condition[0]} {$condition[1]} :w{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);
        $sql .= " WHERE {$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->columns)) {
                $stmt->bindParam(":{$key}", $value);
            }
        }

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }

    public function delete($conditions = [])
    {
        $sql = "DELETE FROM {$this->table} WHERE ";

        $where = [];
        foreach ($conditions as $condition) {
            $link = $condition[3] ?? '';
            $where[] = "{$condition[0]} {$condition[1]} :w{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);
        $sql .= "{$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE Email = :email LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function findPost($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE author_Id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function findPostByStatus($status)
    {
        $sql = "SELECT * FROM {$this->table} WHERE Status = :status";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':status', $status);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function findPostEditStatus($idPost, $status)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :idPost AND Status = :status";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':idPost', $idPost);
        $stmt->bindParam(':status', $status);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function findComment($idPost)
    {
        $sql = "SELECT * FROM {$this->table} WHERE PostId = :idPost";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':idPost', $idPost);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }


    //Viết hàm check xem còn bài viết có id theo category đó không
    public function countPostsByCategory($categoryId) {
        $sql = "SELECT COUNT(*) as postCount FROM {$this->table} WHERE categoryPost_id = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        return $result['postCount'];
    }


    // public function getAllPostsByCategory($categoryId) {
    //     $sql = "SELECT * FROM {$this->table} WHERE categoryPost_id = :categoryId";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bindParam(':categoryId', $categoryId);
    //     $stmt->execute();
    //     $stmt->setFetchMode(\PDO::FETCH_ASSOC);
    //     return $stmt->fetchAll();
    // }


    //lấy tất cả bài viết theo category và id status bằng 3
    public function getAllPostsByCategory($categoryId) {
        $sql = "SELECT * FROM {$this->table} WHERE categoryPost_id = :categoryId AND Status = 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getNamePath($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getCommentById($idPost){
        $sql = "SELECT * FROM {$this->table} WHERE PostId = :idPost";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idPost', $idPost);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }  

    public function getRandomPost(){
        $sql = "SELECT * FROM {$this->table} ORDER BY RAND() LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    // HÀM LẤY 1 USER THEO SESSION ID
    public function getOneUser($id){
        $sql = "";
    } 
    


    public function __destruct()
    {
        $this->conn = null;
    }
}
