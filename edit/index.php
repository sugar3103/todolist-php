<?php
    // connect to the database
    include '../connect/index.php';
    include '../header/index.php'
?>

<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        $assign = $_POST['assign'];
        $email = $_POST['email'];
        if (empty($task) || empty($assign) || empty($email)) {
            $error = "You must fill in all task";
        } else {
            mysqli_query($db, "UPDATE tasks SET task='$task' assign='$assign' email='$email' WHERE id='$id'");
            header('location: index.php');
        }
    }
    $task = mysqli_query($db, "SELECT * FROM tasks WHERE id='$id'")
?>

<body>
    <header>
        <div class="heading">
            <h2>Sugar Edit TodoList with id = <?php echo $id?><h2>
            <?php while ($row = mysqli_fetch_array($task)) { ?>
                <form method="POST" action="../../todolist-php/index.php">
                    <input type="text" 
                        name="task" 
                        class="task_input" 
                        required
                        value="<?php echo $row['task'] ?>"
                    ><br>
                    <input type="text" 
                        name="assign" 
                        class="task_input" 
                        required
                        value="<?php echo $row['assign'] ?>"
                    ><br>
                    <input type="email" 
                        name="email" 
                        class="task_input" 
                        required
                        value="<?php echo $row['email'] ?>"
                    ><br>
                    <button type="submit" class="add_btn" name="submit">Sửa</button>
                </form>
            <?php } ?>
        </div>
    </header>
</body>
</html>