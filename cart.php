<?php
if(isset($_POST['courses'])){
    $courses = $_POST['courses'];
    $course_list = "<ul>";
    foreach($courses as $course){
        // Assuming you have a function to get course details by id
        $course_details = getCourseDetails($course);
        $course_list .= "<li>".$course_details['course_name']."</li>";
    }
    $course_list .= "</ul>";
    echo json_encode(['error' => false, 'list' => $course_list]);
} else {
    echo json_encode(['error' => true, 'message' => 'No courses selected']);
}

function getCourseDetails($course_id){
    $conn = new mysqli("localhost", "root", "", "coursesystem");
    $sql = "SELECT * FROM courses WHERE id='$course_id'";
    $query = $conn->query($sql);
    $course = $query->fetch_assoc();
    $conn->close();
    return $course;
}
?>
