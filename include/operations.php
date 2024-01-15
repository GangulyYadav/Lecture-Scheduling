<?php

require_once('./connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    $action = $_POST['action'];
    // echo "<script>console.log('".$_POST['action']."')</script>";
    switch ($action) {
        case 'addCourse':
            addCourse();
            break;
            
        case 'addLecture':
            addLecture();
            break;

        case 'addInstructor':
            addInstructor();
            break;
                
        case 'assignLecture':
            assignLecture();
            break;

        case 'viewAllCourses':
            viewAllCourses();
            break;
                    
        case 'getAllInstructors':
            getAllInstructors();
            break;
        
        case 'isDateAvailable':
            isDateAvailable();
            break;
            
        case 'getCourses':
            getCourses();
            break;

        case 'deleteCourse':
            if (isset($_POST['courseId'])) {
                deleteCourse($_POST['courseId']);
            }
            break;

        default:
            $response = array('status' => 'error', 'message' => 'Unknown action');
            echo json_encode($response);
            break;
    }
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request');
    echo json_encode($response);
}
                
                
function addCourse() {
    global $conn;

    $courseName = isset($_POST['courseName']) ? $_POST['courseName'] : '';
    $courseLevel = isset($_POST['courseLevel']) ? $_POST['courseLevel'] : '';
    $courseDescription = isset($_POST['courseDescription']) ? $_POST['courseDescription'] : '';

   

    if (isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['courseImage']['tmp_name'];
        $fileName = $_FILES['courseImage']['name'];
        $fileType = $_FILES['courseImage']['type'];

        $uploadPath = '../uploads/' . $fileName;

        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            $sql = "INSERT INTO courses (name, level, description, image) VALUES ('$courseName', '$courseLevel', '$courseDescription', '$uploadPath')";

            if ($conn->query($sql) === TRUE) {
                $response = array('status' => 'success', 'message' => 'Course added successfully');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error', 'message' => 'Error while adding course: ' . $conn->error);
                echo json_encode($response);
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Error moving the uploaded file');
            echo json_encode($response);
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error uploading file');
        echo json_encode($response);
    }
}              
    
    function addLecture() {
        global $conn;
        $courseId = $_POST['lectureCourse'];
        $date = $_POST['lectureDate'];
        $sql = "INSERT INTO lectures (course_id, date) VALUES ('$courseId', '$date')";
        if($conn->query($sql) === TRUE) {
            $response = array('status' => 'success', 'message' => 'Lecture added successfully');
            echo json_encode($response);
        }else{
            $response = array('status' => 'error', 'message' => 'Error while adding lecture: ' . $conn->error);
            echo json_encode($response);
        }
        $conn->query($sql);
        return $conn->insert_id;
    }
    
    function addInstructor() {
        global $conn;
        echo "Called add instructor function in php";
        $instructorName = $_POST['instructorName'];
        $instructorEmail = $_POST['instructorEmail'];
        $instructorPassword = password_hash($_POST['instructorPassword'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO instructors (name, email, password) VALUES ('$instructorName', '$instructorEmail', '$instructorPassword')";
        
        if ($conn->query($sql)) {
            $response = array('status' => 'success', 'message' => 'Instructor added successfully');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Error adding instructor');
            echo json_encode($response);
        }
    }
    
    function assignLecture() {
        $instructorId=$_POST['instructorId'];
        $lectureId=$_POST['lectureId'];
        $lectureDate=$_POST['lectureDate'];

        isDateAvailable($instructorId,$lectureDate,$lectureId);
   
        // global $conn;
      
    }
    
    function viewAllCourses() {
        global $conn;
        $sql = "SELECT id, name, level, description, image FROM courses";
        
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = array(
                    "id" => $row["id"],
                    "courseName" => $row["name"],
                    "courseLevel" => $row["level"],
                    "courseDescription" => $row["description"],
                    "courseImage" => $row["image"],
                );
            }
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }
    }

    function getAllInstructors() {  
        global $conn;
        $result = $conn->query("SELECT * FROM instructors");

        if($result){
            $instructors = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($instructors);
        }else{
            $response = array('status' => 'error', 'message' => 'Error fetching instructors');
            echo json_encode($response);
        }
    }

    function getCourses() {
        global $conn;
        
        $result = $conn->query("SELECT id, name FROM courses");
    
        if ($result) {
            $courses = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($courses);
        } else {
            $response = array('status' => 'error', 'message' => 'Error fetching courses');
            echo json_encode($response);
        }
    }
    
    function isDateAvailable($instructorId, $lectureDate,$lectureId) {
        global $conn;
        $result = $conn->query("SELECT * FROM lectures WHERE `instructor_id` = $instructorId AND `date` = '$lectureDate'");
        
        if ($result) {
            if($result->num_rows == 0){     
                $sql = "INSERT INTO lectures (instructor_id,course_id,date) VALUES ('$instructorId', '$lectureId','$lectureDate')";
                $conn->query($sql);
            }
            else{
                $response = array('status' => 'error', 'message' => 'Already assigned!');
                echo json_encode($response);
            }
        } else {
            echo "false";
            return false;
        }
    }   

    // function deleteCourse($courseId) {
    //     global $conn;
    
    //     $sql = "DELETE FROM courses WHERE id = " . $courseId;
    
    //     if ($conn->query($sql) === TRUE) {
    //         echo "Course deleted successfully";
    //     } else {
    //         echo "Error deleting course: " . $conn->error;
    //     }
    // }
?>
