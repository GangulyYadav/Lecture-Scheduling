# Lecture Scheduling Module

## Overview

This module provides a lecture scheduling system with separate panels for administrators and instructors. The admin panel allows management of instructors, course addition, and lecture scheduling, ensuring no clashes between assigned lectures.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Contributing](#contributing)
- [License](#license)

## Features

### Admin Panel

1. **List of Instructors:**
   - View a list of all instructors.
   - Instructors are randomly generated or added by the admin.

2. **Add Courses:**
   - Add courses with details like name, level, description, and image.
   - Add multiple lectures (batches) to a course after creation.

3. **Schedule Lectures:**
   - Assign lectures to any instructor on any date.
   - Prevent assigning an instructor to multiple lectures on the same date.
   - Dates are automatically assigned when a course is added.

### Instructor Panel

- View a list of all lectures assigned to the logged-in instructor.
- Each entry includes details such as dates and course names.

## Technologies Used

- PHP (Backend)
- MySQL (Database)
- HTML, CSS, JavaScript, Bootstrap (Frontend)

## File Structure

```plaintext
/lecture-scheduling-module
|-- admin
|   |-- adminDashboard.php
|   |-- addCourse.php
|   |-- addInstructor.php
|   |-- addBatch.php
|   |-- assignInstructor.php
|   |-- viewAllInstructors.php
|   |-- viewAllAssignedLectures.php
|   |-- viewAllBatches.php
|   |-- viewAssignedLectures.php
|-- shared (iclude)
|   |-- connection.php
|   |-- logout.php
|   |-- footer.php
|   |-- navbar.html
|   |-- header.php
|   |-- operations.php
|-- login.php
|-- instructor
|-- dashboard.php
|-- other files...
```

## Requirements

- PHP
- MySQL
- Web server (e.g., Apache)
- Modern web browser

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/GangulyYadav/lecture-scheduling.git
    cd yourproject
    ```

2. Import the SQL file into your MySQL database from db folder named lecture_scheduling.sql. You can use a tool like phpMyAdmin or the command line:

    ```bash
    mysql -u username -p yourdatabase < lecture_scheduling.sql
    ```

3. Update database configuration:

    Open `include/connection.php` and update the database connection details.

4. Start your web server.

## Usage

1. Navigate to `login.php` and log in using the provided credentials.
- use admin as id and password can implement secure way to authentication like I have implemented in the instructor's login module

2. Explore the different pages in the admin section:

   - `admin/adminDashboard.php`
   - `admin/addBatch.php`
   - `admin/addCourse.php`
   - `admin/addInstructor.php`
   - `admin/assignInstructor.php`
   - `admin/viewAllAssignedLectures.php`
   - `admin/viewAllBatches.php`
   - `admin/viewAllCourses.php`
   - `admin/viewAllInstructors.php`

3. Check the main user dashboard at `dashboard.php`.

## Contributing

This project is fully developed by Ganguly Yadav.

## License

Apache license is added because we are using their technologies.

