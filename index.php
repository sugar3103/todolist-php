<?php
    // connect to the database
    include './connect/index.php';
?>

<?php
    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        $assign = $_POST['assign'];
        $email = $_POST['email'];
        if (empty($task) || empty($assign) || empty($email)) {
            $error = "You must fill in all task";
        } else {
            mysqli_query($db, "INSERT INTO tasks (task, assign, email) VALUES ('$task', '$assign', '$email')");
            header('location: index.php');
        }
    }

    // delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }
    // edit task
    if (isset($_GET['edit_task'])) {
        $id = $_GET['edit_task'];
        // mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }

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
        <?php 
            include './header/index.php'
        ?>
        <div class="heading">
            <h2>Sugar Todo List Application with PHP and MySQL<h2>
        </div>
    </header>
    <section>
        <div class="container">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg modal-open-box" 
            data-toggle="modal" data-target="#myModal"><h4>Thêm Task cho Staff</h4></button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Thêm mới task cho Staff</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="index.php">
                                <?php if (isset($error)) { ?>
                                    <p><?php echo $error ?></p>
                                <?php } ?>
                                <input type="text" 
                                    name="task" 
                                    class="task_input" 
                                    placeholder="Task details" 
                                    required><br>
                                <input type="text" 
                                    name="assign" 
                                    class="task_input" 
                                    placeholder="Assign to " 
                                    required><br>
                                <input type="email" 
                                    name="email" 
                                    class="task_input" 
                                    placeholder="email" 
                                    required><br>
                                <button type="submit" class="add_btn" name="submit">Thêm vào</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>  
                </div>
            </div>
        </div>


        
        <form method="POST" action="index.php">
            <input type="text" name="search" class="task_input">
            <button type="submit" class="add_btn" name="submit">Tìm kiếm</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Task</th>
                    <th>Assign</th>
                    <th>Email</th>
                    <th>Done</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td class="delete"><?php echo $i; ?></td>
                        <td class="task"><?php echo $row['task']; ?></td>
                        <td class="task"><?php echo $row['assign']; ?></td>
                        <td class="task"><?php echo $row['email']; ?></td>
                        <td class="task"><input type="checkbox" class="task_input"></td>
                        <td class="delete">
                            <a href="/todolist-php/edit/index.php?id=<?php echo $row['id'] ?>">Edit</a>
                        </td>
                        <td class="delete">
                            <a href="index.php?del_task=<?php echo $row['id'] ?>">x</a>
                        </td>
                    </tr>
                <?php
                    $i++;
                } ?>
            </tbody>
        </table>
    </section>
    <?php 
        include './footer/index.php'
    ?>
</body>
</html>