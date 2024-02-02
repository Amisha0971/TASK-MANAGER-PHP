<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'];
    addTask($taskName);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Task</title>
</head>
<style>
    /* Add this CSS to style.css */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

h1 {
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 50%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

a {
    text-decoration: none;
    color: #3498db;
    display: block;
    margin-top: 10px;
}

a:hover {
    text-decoration: underline;
}

</style>
<body>
    <h1>Add New Task</h1>

    <form method="POST" action="">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required>
        <button type="submit">Add Task</button>
    </form>

    <a href="index.php">Back to Task List</a>
</body>
</html>
