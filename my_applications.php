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
        My Applications
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Applications</li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Intake Name</th>
                  <th>Course Name</th>
                  <th>Course ID</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT application_details.*, intakes.intake_name AS intakename, courses.course_name AS coursename, courses.courseid AS courseid 
                            FROM application_details 
                            LEFT JOIN intakes ON intakes.id = application_details.intake_id 
                            LEFT JOIN courses ON courses.id = application_details.course_id 
                            WHERE application_details.applicant_id = '".$_SESSION['applicant']."'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['intakename']."</td>
                          <td>".$row['coursename']."</td>
                          <td>".$row['courseid']."</td>
                          <td>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Remove</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
<script>
$(document).ready(function() {
    $('.delete').click(function() {
        var id = $(this).data('id');
        if(confirm("Are you sure you want to remove this application?")) {
            $.ajax({
                type: "POST",
                url: "delete_application.php", // Path to the PHP script that handles deletion
                data: { id: id },
                success: function(response) {
                    if(response == 'success') {
                        location.reload(); // Reload the page to see the updated list
                    } else {
                        alert("Error removing application: " + response);
                    }
                }
            });
        }
    });
});
</script>
</html>

