<?php
require "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Scheduling</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: radial-gradient(#ff8a00, #e52e71);
            background-image: radial-gradient(circle at top right, #ff8a00, red, #e52e71);
        }
        .card {
            background: linear-gradient(to right, #ff6b6b, #ffa07a);
            margin: 10px;
            flex: 1;
        }
        a:hover{
            text-decoration:none;
        }
    </style>
</head>
<body class="bg-light">
<?php
    require "../include/navbar.html";
?>
<div class="container mt-5 mx-auto">
    <div class="row d-flex flex-row justify-content-around">
    <div class="col-md-4">
        <a href="./addCourse.php" class="card">
            <div class="card text-white" >
                <div class="card-body">
                    <h4 class="card-title">Add Course <i class="fas fa-book"></i></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="./addInstructor.php" class="card">
            <div class="card text-white">
                <div class="card-body">
                    <h4 class="card-title align-items-center ">Add Instructor <i class="fas fa-chalkboard-teacher"></i></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="./assignInstructor.php" class="card">
            <div class="card text-white">
                <div class="card-body">
                    <h4 class="card-title">Assign Lecture <i class="fas fa-clock"></i></h4>
                </div>
            </div>
        </a>
    </div>
    </div>

    <div class="row d-flex flex-row justify-content-around">
    <div class="col-md-4">    
    <a href="./viewAllCourses.php" class="card">
            <div class="card text-white" >
                <div class="card-body">
                    <h4 class="card-title">View All Courses <i class="fas fa-book"></i> <i class="fas fa-eye"></i></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="./viewAllInstructors.php" class="card">
            <div class="card text-white">
                <div class="card-body">
                    <h4 class="card-title align-items-center ">View All Instructor <i class="fas fa-chalkboard-teacher"></i> <i class="fas fa-eye"></i></h4>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="./viewAllAssignedLectures.php" class="card">
            <div class="card text-white">
                <div class="card-body">
                    <h4 class="card-title">Assigned Lectures <i class="fas fa-clock"></i> <i class="fas fa-eye"></i></h4>
                </div>
            </div>
        </a>
    </div>
    </div>

    <div class="row d-flex flex-row justify-content-around">
    <div class="col-md-6">
        <a href="./addBatch.php" class="card">
            <div class="card text-white" >
                <div class="card-body">
                    <h4 class="card-title">Add Batch <i class="fas fa-book"></i> <i class="fas fa-eye"></i></h4>
                </div>
            </div>
        </a>
    </div>

        <div class="col-md-6">

            <a href="./viewAllBatches.php" class="card">
                <div class="card text-white" >
                    <div class="card-body">
                        <h4 class="card-title">View Batches <i class="fas fa-book"></i> <i class="fas fa-eye"></i></h4>
                    </div>
                </div>
            </a>
        </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./js/functions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<?php require "../include/footer.php";?>
</html>
