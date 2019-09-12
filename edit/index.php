<?php
    // connect to the database
    include 'connect/index.php';
?>

<?php
    if(isset($_GET['id'])) return $id = $_GET['id'];

    $tasks = mysqli_query($db, "SELECT * FROM tasks")
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
    <title>TodoList Application with PHP and MySQL</title>
</head>
<body>
    <header>
        <div class="heading">
            <h2>Sugar Edit TodoList with <?php echo $id ?><h2>
        </div>
    </header>
</body>
</html>