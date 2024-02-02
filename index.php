<?php
include 'functions.php';

$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Task Management System</title>
</head>
<style>
/* Add this CSS to style.css */

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align:center;
    border-bottom: 1px solid #ddd;
    
}
td {
    font-weight: bold;  /* Make content in td bold */
}

th {
    background-color: #3498db;
    color: #fff;
}

tr:hover {
    background-color: #f5f5f5;
}

.btn-mark {
    background-color: #27ae60;
    color: #fff;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
}

.btn-delete {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
}
.btn-add {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}


</style>
<body>
    <div class="container">
        <center><u><h1>TASK LIST</h1></u></center>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TASK NAME</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                </tr> 
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo $task['id']; ?></td>                      
                        <td><?php echo $task['task_name']; ?></td>
                        <td>
                            <?php if ($task['is_completed']): ?>
                                <span style="color: #27ae60;">Completed</span>
                            <?php else: ?>
                                <span style="color: #e74c3c;">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!$task['is_completed']): ?>
                                <button class="btn-mark" onclick="markAsCompleted(<?php echo $task['id']; ?>)">Mark Completed</button>
                            <?php endif; ?>
                            <button class="btn-delete" onclick="deleteTask(<?php echo $task['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <center><a href="add_task.php" class="btn-add">Add New Task</a></center>
    </div>

    <script>
        function markAsCompleted(taskId) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Task marked as completed!");
                        // You might want to update the UI here
                    } else {
                        alert("Error marking task as completed");
                    }
                }
            };

            xhr.open("GET", "mark_completed.php?id=" + taskId, true);
            xhr.send();
        }

        function deleteTask(taskId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Task deleted!");
                    // You might want to update the UI here (remove the deleted task from the table)
                } else {
                    alert("Error deleting task");
                }
            }
        };

        xhr.open("GET", "delete_task.php?id=" + taskId, true);
        xhr.send();
    }
    </script>
</body>
</html>