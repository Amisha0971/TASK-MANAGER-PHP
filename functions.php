<?php
include 'config.php';

function getTasks() {
    global $conn;
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function addTask($taskName) {
    global $conn;
    $sql = "INSERT INTO tasks (task_name) VALUES ('$taskName')";
    $conn->query($sql);
}

function markAsCompleted($taskId) {
    global $conn;
    $sql = "UPDATE tasks SET is_completed = 1 WHERE id = $taskId";
    $conn->query($sql);
}

function deleteTask($taskId) {
    global $conn;
    $sql = "DELETE FROM tasks WHERE id = $taskId";
    $conn->query($sql);
}
?>
