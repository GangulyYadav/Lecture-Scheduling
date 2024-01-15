<?php
function getAssignedLectures($instructorId) {
    require_once "./include/connection.php";

    $sql = "
        SELECT
            lectures.id AS lecture_id,
            courses.name AS course_name,
            lectures.date
        FROM
            lectures
        JOIN
            courses ON lectures.course_id = courses.id
        WHERE
            lectures.instructor_id = $instructorId;
    ";

    $result = $conn->query($sql);

    if ($result) {
        $lectures = $result->fetch_all(MYSQLI_ASSOC);
        return $lectures;
    } else {
        echo "Error executing the query: " . $conn->error;
        return [];
    }

    $conn->close();
}


session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "instructor") {
    header("Location: login.php");
    exit();
}

$instructorId = $_SESSION['user_id'];
$assignedLectures = getAssignedLectures($instructorId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
require "./navbaruser.html";
?> 
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Instructor Dashboard</h1>
            <p class="lead">Welcome, <?php echo $_SESSION['user_name']; ?></p>
        </div>
      <?php if (empty($assignedLectures)) : ?>
      
           <h2 class="text-danger text-center"> Oww! No lectures assigned to you currently.</h2>
       
      <?php else : ?>
        <h2>Lectures Assigned to You</h2>
        <div class="row">
            <?php foreach ($assignedLectures as $lecture) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $lecture['course_name']; ?></h5>
                            <p class="card-text"><strong>Date:</strong> <?php echo $lecture['date']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php require "./include/footer.php";?>
</html>
