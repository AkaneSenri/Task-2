<?php 

class Users
{
    private $conn;
    private $table = 'users';

    public $id;
    public $email;
    public $full_name;
    public $gender;
    public $status;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function getUsers()
    {
        $query = 'SELECT *
            FROM ' . $this->table . '';

        $stmt = $this->conn->prepare($query); 

        $stmt->execute();

        return $stmt;
    }

    public function getUser()
    {
        $query = 'SELECT *
            FROM ' . $this->table . ' WHERE id = ?
            LIMIT 0,1';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->email = $row['email'];
        $this->full_name = $row['full_name'];
        $this->gender = $row['gender'];
        $this->status = $row['status'];
    }

    public function addUser()
    {
        $query = 'INSERT INTO ' . $this->table . ' 
            SET email = :email, 
            full_name = :full_name, 
            gender = :gender, 
            status = :status';
        
        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->full_name = htmlspecialchars(strip_tags($this->full_name));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->status = htmlspecialchars(strip_tags($this->status));

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':status', $this->status);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
            
        return false;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . '
            SET email = :email, 
            full_name = :full_name, 
            gender = :gender, 
            status = :status
            WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->full_name = htmlspecialchars(strip_tags($this->full_name));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);
 
        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' 
          WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
            
        return false;        
    }
}