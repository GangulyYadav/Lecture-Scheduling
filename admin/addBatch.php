<?php
require "../include/header.php";
require "../include/connection.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submit"])) {
        $courseId = $_POST["lectureCourse"];
        $batchName = $_POST["batch"];
        $insertBatchQuery = "INSERT INTO batches (course_id, batch) VALUES ('$courseId', '$batchName')";
        $result = $conn->query($insertBatchQuery);
        if ($result) {
            echo "<script>alert('Batch added Successfully!')</script>";
        
        } else {
            echo "<script>alert('Something went wrong while adding a batch!')</script>";
         
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Batch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require "../include/navbar.html";
?>
<div class="container mt-5">
    <h2 class="mb-4">Add Batch</h2>
    <form id="addBatchForm" method="POST" action="./addBatch.php">
        <div class="form-group">
            <label for="lectureCourse">Select Course:</label>
            <select class="form-control" id="lectureCourse" name="lectureCourse" required>
            </select>
        </div>
        <div class="form-group">
            <label for="batch">Batch:</label>
            <input type="text" class="form-control" id="batch" name="batch" required>
        </div>
        <button type="submit" class="btn btn-primary" value="submit" name="submit">Add Batch</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/functions.js"></script>

</body>
<?php require "../include/footer.php";?>
</html>
