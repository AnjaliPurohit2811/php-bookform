<?php

class Config
{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "rnw";
    private $status;

    public function connectDatabase()
    {
        $this->status = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
        if (!$this->status) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function insertDatabase($bookname, $author, $price)
    {
        $query = "INSERT INTO bookdetails (bookname, author, price) VALUES ('$bookname', '$author', $price)";
        $insertData = mysqli_query($this->status, $query);

        if ($insertData) {
            echo "<script>alert('Insert data Successfully!')</script>";
        } else {
            echo "<script>alert('Failed to insert data.')</script>";
        }
    }

    function selectDatabase()
    {
        $query = "SELECT * FROM bookdetails";
        $selectData = mysqli_query($this->status, $query);

        return $selectData;
    }

    function updateDatabase($id, $bookname, $author, $price)
{
    $query = "UPDATE bookdetails SET bookname='$bookname', author='$author', price=$price WHERE id=$id";
    
    $updateData = mysqli_query($this->status, $query);
    
    return $updateData; 
}


    function deleteDatabase($id)
    {
        $query = "DELETE FROM bookdetails WHERE id=$id";
        $deleteData = mysqli_query($this->status, $query);

        return $deleteData;
    }
}

?>
