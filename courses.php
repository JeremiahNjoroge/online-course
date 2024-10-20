<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Registration
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
          <form method="POST" id="courseForm" action="submit_courses.php">
              <div class="col-xs-12">
                  <div class="box">
                      <div class="box-body">
                          <div class="form-group">
                              <label for="intake">Select Intake:</label>
                              <select class="form-control" id="intake" name="intake" required>
                                  <option value="">-- Select Intake --</option>
                                  <?php
                                  // Database connection
                                  $conn = new mysqli("localhost", "root", "", "votesystem");
                                  if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                  }

                                  // Query to fetch intakes
                                  $sql = "SELECT * FROM intakes"; // Adjust table name and columns as needed
                                  $query = $conn->query($sql);
                                  
                                  // Populate the dropdown with intakes
                                  while($row = $query->fetch_assoc()){
                                      echo "<option value='".$row['id']."'>".$row['intake_name']."</option>"; // Adjust as needed
                                  }

                                  $conn->close();
                                  ?>
                              </select>
                          </div>
                          <table id="example1" class="table table-bordered">
                              <thead>
                                  <th class="hidden"></th>
                                  <th>Select</th>
                                  <th>Course Name</th>
                                  <th>Course ID</th>
                                  <th>Description</th>
                              </thead>
                              <tbody>
                                  <?php
                                  // Query to fetch courses
                                  $conn = new mysqli("localhost", "root", "", "coursesystem");
                                  if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                  }
                                  $sql = "SELECT * FROM courses";
                                  $query = $conn->query($sql);
                                  while($row = $query->fetch_assoc()){
                                      echo "
                                      <tr>
                                          <td class='hidden'></td>
                                          <td><input type='checkbox' name='course[]' value='".$row['id']."' class='course-select'></td>
                                          <td>".$row['course_name']."</td>
                                          <td>".$row['courseid']."</td>
                                          <td>".$row['description']."</td>
                                      </tr>
                                      ";
                                  }
                                  $conn->close();
                                  ?>
                              </tbody>
                          </table>
                          <button type="button" class="btn btn-primary btn-flat" id="preview"><i class="fa fa-shopping-basket"></i> View Cart</button>
                          <button type="submit" class="btn btn-success btn-flat" name="submit"><i class="fa fa-check-square-o"></i> Complete Selection</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/courses_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  // Initialize iCheck plugin
  $('.course-select').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  // Handle the preview button click
  $('#preview').click(function(e){
    e.preventDefault();
    var selectedCourses = [];
    $('input[name="course[]"]:checked').each(function() {
      selectedCourses.push($(this).val());
    });
    if(selectedCourses.length == 0){
      alert("No courses selected.");
    } else {
      $.ajax({
        type: 'POST',
        url: 'cart.php',
        data: {courses: selectedCourses},
        dataType: 'json',
        success: function(response){
          if(response.error){
            alert(response.message);
          } else {
            $('#preview_modal').modal('show');
            $('#preview_body').html(response.list);
          }
        }
      });
    }
  });
});
</script>
</body>
</html>
