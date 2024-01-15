<?php
require "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Scheduling - Add Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<?php
require "../include/navbar.html";
?>
<div class="container mt-5 mx-auto">
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Course</h4>
                    <form id="courseForm">
                        <div class="form-group">
                            <label for="courseName">Course Name:</label>
                            <input type="text" class="form-control" id="courseName" name="courseName" required>
                        </div>
                        <div class="form-group">
                            <label for="courseLevel">Level:</label>
                            <input type="text" class="form-control" id="courseLevel" name="courseLevel" required>
                        </div>
                        <div class="form-group">
                            <label for="courseDescription">Description:</label>
                            <textarea class="form-control" id="courseDescription" name="courseDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="courseImage">Image Upload:</label>
                            <input type="file" class="form-control-file" id="courseImage" name="courseImage" accept="image/*" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addCourse()">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/functions.js"></script>

</body>
<?php require "../include/footer.php";?>
</html>
