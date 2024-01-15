<?php
require "../include/header.php";
require_once "../include/connection.php";

$sql = "
    SELECT
        lectures.id AS lecture_id,
        courses.name AS course_name,
        instructors.name AS instructor_name,
        lectures.date
    FROM
        lectures
    JOIN
        courses ON lectures.course_id = courses.id
    JOIN
        instructors ON lectures.instructor_id = instructors.id;
";

$result = $conn->query($sql);

if ($result) {
    $lectures = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error executing the query: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<?php
require "../include/navbar.html";
?>
    <div class="container m-20">
        <h3 class="mt-10" style="margin-top:10px;">List of All Assigned Lectures</h3>
        <table id="lecturesTable" class="table ">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Instructor Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lectures as $lecture) : ?>
                    <tr>
                        <td><?= $lecture['course_name'] ?></td>
                        <td><?= $lecture['instructor_name'] ?></td>
                        <td><?= $lecture['date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#lecturesTable').DataTable();
        });
    </script>
</body>
<?php require "../include/footer.php";?>
</html>
