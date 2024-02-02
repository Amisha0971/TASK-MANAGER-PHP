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
<body>
    <h1>Task List</h1>
    
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo $task['task_name']; ?>
                <?php if (!$task['is_completed']): ?>
                    <a href="mark_completed.php?id=<?php echo $task['id']; ?>">Mark as Completed</a>
                <?php endif; ?>
                <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="add_task.php">Add New Task</a>
</body>
</html>
