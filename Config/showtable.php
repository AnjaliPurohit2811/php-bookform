<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    include_once "config.php";

    
    $c1 = new Config();
    $c1->connectDatabase();
    $result = $c1->selectDatabase();

 
    if (isset($_REQUEST['delete'])) {
        $id = $_REQUEST['deleteId'];
        $c1->deleteDatabase($id);
        header("Refresh:0");
    }

    
    if (isset($_REQUEST["edit"])) {
        $_SESSION['id'] = $_REQUEST['deleteId'];
        $_SESSION['bookname'] = $_REQUEST['bookname'];
        $_SESSION['author'] = $_REQUEST['author'];
        $_SESSION['price'] = $_REQUEST['price'];
        header("Location: updateform.php");
    }
    ?>
    <div class="row mt-5">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Book List</h3>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($res = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $res['id']; ?></th>
                                    <td><?php echo $res['bookname']; ?></td>
                                    <td><?php echo $res['author']; ?></td>
                                    <td><?php echo $res['price']; ?></td>
                                    <td>
                                        <form method="POST" action="">
                                            <input type="hidden" name="deleteId" value="<?php echo $res['id']; ?>">
                                            <input type="hidden" name="bookname" value="<?php echo $res['bookname']; ?>">
                                            <input type="hidden" name="author" value="<?php echo $res['author']; ?>">
                                            <input type="hidden" name="price" value="<?php echo $res['price']; ?>">
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button type="submit" name="edit" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil" style="color: white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <center>
                        <button name="submit" onclick="location.href='index.php'" class="btn btn-outline-success">Back To Form
                            </button>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
