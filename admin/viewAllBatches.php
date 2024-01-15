<?php
require "../include/header.php";

require "../include/connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Batches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require "../include/navbar.html";
?>
<div class="container mt-5">
    <h2 class="mb-4">View Batches</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Batch ID</th>
            <th>Course Name</th>
            <th>Batch Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $getBatchesQuery = "SELECT batches.id AS batch_id, courses.name AS courseName, batches.batch
                            FROM batches
                            INNER JOIN courses ON batches.course_id = courses.id";
        $batchesResult = $conn->query($getBatchesQuery);

        while ($batch = $batchesResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $batch['batch_id'] . '</td>';
            echo '<td>' . $batch['courseName'] . '</td>';
            echo '<td>' . $batch['batch'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<?php require "../include/footer.php";?>
</html>
