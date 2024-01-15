document.addEventListener("DOMContentLoaded", function() {
    var currentPage = window.location.pathname; 
    if (currentPage.includes("addInstructor")) {
        // fetchCourses()
    } else if (currentPage.includes("assignInstructor")) {
        fetchCourses()
        fetchInstructors();
    } else if (currentPage.includes("addBatch")) {
        fetchCourses()
    } else if (currentPage.includes("addCourse")) {
        fetchCourses()
    } 
    // else if (currentPage.includes("viewAllCourses.html")) {
    //     viewAllCourses()
    // }
});

function addCourse() {
    var courseName = document.getElementById("courseName").value;
    var courseLevel = document.getElementById("courseLevel").value;
    var courseDescription = document.getElementById("courseDescription").value;

    var courseImageInput = document.getElementById("courseImage");
    
    var formData = new FormData();

    formData.append("courseImage", courseImageInput.files[0]);

    formData.append("action", "addCourse");
    formData.append("courseName", courseName);
    formData.append("courseLevel", courseLevel);
    formData.append("courseDescription", courseDescription);

    $.ajax({
        type: "POST",
        url: "../include/operations.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            alert("Course added successfully!");
            console.log("Added successfully", response);
        },
        error: function(error) {
            alert("Something went wrong while adding course!");
            console.error("Error ", error);
        }
    });
}


// function addCourse() {
    
//     var courseName = document.getElementById("courseName").value;
//     var courseLevel = document.getElementById("courseLevel").value;
//     var courseDescription = document.getElementById("courseDescription").value;
//     var courseImage = document.getElementById("courseImage").value;

//     $.ajax({
//         type: "POST",
//         url: "operations.php",
//         data: {
//             action: "addCourse",
//             courseName: courseName,
//             courseLevel: courseLevel,
//             courseDescription: courseDescription,
//             courseImage: courseImage
//         },
//         success: function(response) {
//             console.log("Added successfully",response);
//         },
//         error: function(error) {
//             console.error("Error ",error);
//         }
//     });
// }

function addLecture() {

    var lectureCourse = document.getElementById("lectureCourse").value;
    var lectureDate = document.getElementById("lectureDate").value;
    
    if(!lectureDate){
        alert("Please select a date.");
        return;
    }
    var currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);
    
    var selectedDate = new Date(lectureDate);
    selectedDate.setHours(0, 0, 0, 0);
    
    console.log("Current Date ", currentDate);
    console.log("Selected Date ", selectedDate);
    console.log("Current Date ",currentDate)
    console.log("Selected Date ",selectedDate)
    if (selectedDate < currentDate) {
        alert("Please select a date that is today or in the future.");
        return;
    }
    else{
        $.ajax({
            type: "POST",
            url: "../include/operations.php", 
            data: {
                action: "addLecture",
                lectureCourse: lectureCourse,
                lectureDate: lectureDate
            },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
}

// function addInstructor() {
//     console.log("Called add instructor function from js file");
//     var instructorName = document.getElementById("instructorName").value;
//     var instructorEmail = document.getElementById("instructorEmail").value;
//     var instructorPassword = document.getElementById("instructorPassword").value;
    
//     $.ajax({
//         type: "POST",
//         url: "../include/operations.php",
//         data: {
//             action: "addInstructor",
//             instructorName: instructorName,
//             instructorEmail: instructorEmail,
//             instructorPassword: instructorPassword,
//         },
//         success: function(response) {
//             console.log("Instructor added successfully", response);
//         },
//         error: function(error) {
//             console.error("Error adding instructor", error);
//         }
//     });
// }

function addInstructor() {
    var instructorName = $("#instructorName").val();
    var instructorEmail = $("#instructorEmail").val();
    var instructorPassword = $("#instructorPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (instructorPassword !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    $.ajax({
        type: "POST",
        url: "../include/operations.php",
        data: {
            action: "addInstructor",
            instructorName: instructorName,
            instructorEmail: instructorEmail,
            instructorPassword: instructorPassword
        },
        success: function(response) {
            alert("Instructor added successfully!");
        },  
        error: function(error) {
            console.error("Error adding instructor", error);
            alert("Error adding instructor. Please try again.");
        }
    });
}

function assignLecture() {
    var lectureCourse = document.getElementById("lectureCourse").value;
    var selectedInstructor = document.getElementById("instructorList").value;
    console.log("Selected instructor ",selectedInstructor);
    var lectureCourse = document.getElementById("lectureCourse").value;
    console.log("Selected course ",lectureCourse);
    var lectureDate = document.getElementById("lectureDate").value;
    
    if(!lectureDate){
        alert("Please select a date.");
        return;
    }
    var currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);
    
    var selectedDate = new Date(lectureDate);
    selectedDate.setHours(0, 0, 0, 0);
    
    console.log("Current Date ", currentDate);
    console.log("Selected Date ", selectedDate);
    console.log("Current Date ",currentDate)
    console.log("Selected Date ",selectedDate)
    
    if (!selectedInstructor) {
        alert("Please select an instructor.");
        return;
    }
    
    if (lectureDate < currentDate) {
        alert("Please select a date that is today or in the future.");
        return;
    }else{

        $.ajax({
            type: "POST",
        url: "../include/operations.php",
        data: {
            action: "assignLecture",
            lectureId: lectureCourse,
            instructorId: selectedInstructor,
            lectureDate: lectureDate,
        },
        success: function(response) {
            console.log(response)

            if (response === '{"status":"error","message":"Already assigned!"}') {
                alert('The instructor has already assigned a lecture this day');
            }
            else{
                alert('Lecture Assigned Successfully');
            }
        },
        error: function(error) {
            console.error("Error assigning instructor", error);
        }
    });
}
}



function fetchCourses() {
    $.ajax({
        type: "POST",
        url: "../include/operations.php", 
        data: {
            action: "getCourses"
        },

        success: function(response) {
            var courses = JSON.parse(response);

            var selectElement = document.getElementById("lectureCourse");
            selectElement.innerHTML = ""; 

            var defaultOption = document.createElement("option");
            defaultOption.value = ""; 
            defaultOption.text = "Select";
            selectElement.appendChild(defaultOption);

            for (var i = 0; i < courses.length; i++) {
                var option = document.createElement("option");
                option.value = courses[i].id;
                option.text = courses[i].name;
                selectElement.appendChild(option);
            }
        },

        error: function(error) {
            console.error("Error ", error);
        }
    });
}

function fetchInstructors() {
    $.ajax({
        type: "POST",
        url: "../include/operations.php", 
        data: {
            action: "getAllInstructors"
        },

        success: function(response) {
            var courses = JSON.parse(response);

            var selectElement = document.getElementById("instructorList");
            selectElement.innerHTML = ""; 

            var defaultOption = document.createElement("option");
            defaultOption.value = ""; 
            defaultOption.text = "Select";
            selectElement.appendChild(defaultOption);

            for (var i = 0; i < courses.length; i++) {
                var option = document.createElement("option");
                option.value = courses[i].id;
                option.text = courses[i].name;
                selectElement.appendChild(option);
            }
        },

        error: function(error) {
            console.error("Error ", error);
        }
    });
}


