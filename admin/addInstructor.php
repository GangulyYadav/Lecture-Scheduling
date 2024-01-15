<?php
require "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Instructor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require "../include/navbar.html";
?>
<div class="container mt-5">
    <h2 class="mb-4">Add Instructor</h2>
    <form id="addInstructorForm">
        <div class="form-group">
            <label for="instructorName">Instructor Name:</label>
            <input type="text" class="form-control" id="instructorName" name="instructorName" required>
        </div>
        <div class="form-group">
            <label for="instructorEmail">Instructor Email:</label>
            <input type="email" class="form-control" id="instructorEmail" name="instructorEmail" required>
        </div>
        <div class="form-group">
            <label for="instructorPassword">Instructor Password:</label>
            <input type="password" class="form-control" id="instructorPassword" name="instructorPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="addInstructor()">Add Instructor</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/functions.js"></script>

</body>
<?php require "../include/footer.php";?>
</html>
