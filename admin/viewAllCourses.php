<?php
require "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
        }

        .card {
            /* border: 1px solid #dcdcdc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease; */
            background-size: cover;
            background-position: center;
            height: 200px; 
            margin-bottom: 20px;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card-body {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 15px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<?php
require "../include/navbar.html";
?>
<div class="container mt-5">
    <?php
      require "../include/connection.php";
      $sql = "SELECT id, name, level, description, image FROM courses";
        
      $result = $conn->query($sql);
    
      while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3" style="background-image: url(\'' . $row['image'] . '\');">';
            echo '<div class="card-body" >';
            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
            echo '<p class="card-text"><strong>Course Level:</strong> ' . $row['level'] . '</p>';
            echo '<p class="card-text"><strong>Description:</strong> ' . $row['description'] . '</p>';
            // echo '<img src="'.$row['image'].'" alt="not working" style="height=100px; width=100px;"/>';
            // echo '<button class="btn btn-danger" onclick="deleteCourse(' . $row['id'] . ')">Delete</button>';
            // echo '<button class="btn btn-danger" onclick="deleteCourse(' . $row['id'] . ')">Delete</button>';
            echo '</div>';
            echo '</div>';
        }

    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- <script>
    function deleteCourse(courseId) {
        if (confirm('Are you sure you want to delete this course?')) {
            $.ajax({
                type: "POST",
                url: "operations.php",
                data: { action: "deleteCourse", courseId: courseId },
                success: function(response) {
                    console.log("Course deleted );
                },
                error: function(error) {
                    console.error("Error deleting course", error);
                }
            });
        }
    }
</script> -->


</body>
<?php require "../include/footer.php";?>
</html>
