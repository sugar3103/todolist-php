<?php
    // connect to the database
    include '../connect/index.php';
    include '../header/index.php';
?>
<?php 
    // $result = "";
    // if(isset($_POST['submit'])) {
    //     if(preg_match("/[A-Z  | a-z]+/", $_POST['search'])) { 
    //         $search = $_POST['search'];
    //         $tasks="SELECT id, task, assign, email FROM todo 
    //                 WHERE task LIKE '%" . $search . "%' 
    //                 OR assign LIKE '%" . $search  ."%' 
    //                 OR email LIKE '%" . $search  ."%'"; 
    //         $result = mysql_query($tasks);
    //     }else echo "<p>nothing found</p>";
    // }
?>


<body>
    <header>
        <div class="heading">
            <h2>Sugar Search TodoList with empty<h2>
        </div>
        <form method="GET" action="index.php">
            <input type="text" name="keywords" class="task_input" autocomplete="off">
            <input type="submit" value="Tìm kiếm" class="add_btn">
        </form>
    </header>
    <section>
        <?php 
        if(isset($_GET['keywords'])) {
            $keywords = $_GET['keywords'];
            $query =  $db->query("
                SELECT task, assign, email 
                FROM tasks 
                WHERE task LIKE '%{$keywords}%' 
                    OR assign LIKE '%{$keywords}%' 
                    OR email LIKE '%{$keywords}%' 
            ");
            // $query = mysqli_query($db, "SELECT task, assign, email FROM tasks")
            ?>
            <div class="result_count">
                Found <?php echo $query->num_rows; ?> results
            </div>
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
                        if($query->num_rows) {
                            $i = 1;
                            while($r = $query->fetch_object()) { ?>
                                <tr>
                                    <td class="delete"><?php echo $i; ?></td>
                                    <td class="task"><?php echo $r->task; ?></td>
                                    <td class="task"><?php echo $r->assign; ?></td>
                                    <td class="task"><?php echo $r->email; ?></td>
                                    <td class="task"><input type="checkbox" class="task_input task_checkbox"></td>
                                    <td class="delete">
                                        <a href="/todolist-php/edit/index.php?id=<?php echo $r->id ?>">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <a href="index.php?del_task=<?php echo $r->id ?>">x</a>
                                    </td>
                                </tr>
                            <?php 
                                $i++ ;
                            } ?>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

    </section>
</body>
</html>