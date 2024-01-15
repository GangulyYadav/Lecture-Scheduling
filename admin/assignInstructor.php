<?php
require "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Instructor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require "../include/navbar.html";
?>
<div class="container mt-5">
    <h2 class="mb-4">Assign Instructor</h2>
    <form id="assignInstructorForm">
        <div class="form-group">
            <label for="lectureCourse">Select Course:</label>
            <select class="form-control" id="lectureCourse" name="lectureCourse" required>
            </select>
        </div>
        <div class="form-group">
            <label for="instructorList">Select Instructor:</label>
            <select class="form-control" id="instructorList" name="instructorList" required>
            </select>
        </div>
        <div class="form-group">
            <label for="lectureDate">Lecture Date:</label>
            <input type="date" class="form-control" id="lectureDate" name="lectureDate" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="assignLecture()">Assign Instructor</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/functions.js"></script>

</body>
<?php require "../include/footer.php";?>
</html>
