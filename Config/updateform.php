<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4">Book Updatation</h1>
        </div>
        <?php
        session_start();
        include_once"config.php";

        $c1 = new Config();
        $c1->connectDatabase();

        $id = $_SESSION['id'];
        $bookname = $_SESSION['bookname'];
        $author = $_SESSION['author'];
        $price = $_SESSION['price'];

       
        if (isset($_REQUEST['submit'])) {
            $bookname = $_REQUEST['bookname'];
            $author = $_REQUEST['author'];
            $price = $_REQUEST['price'];

          $c1->updateDatabase($id, $bookname, $author, $price);
            header("Location: showtable.php");

          
        }

        ?>

        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card" style="shadow-sm" >        
              <div class="card-body">
                        <h3 class="card-title text-center mb-4">Book Update</h3>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Book Name</label>
                                <input id="bookname" class="form-control" name="bookname" type="text" placeholder="Book Name" value="<?php echo $bookname; ?>"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input id="author" class="form-control" name="author" type="text" placeholder="Author" value="<?php echo $author; ?>"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input id="price" class="form-control" name="price" type="number"
                                    placeholder="Price" value="<?php echo $price; ?>" required>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button name="submit" class="btn btn-outline-success">Update</button>
                                    
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>