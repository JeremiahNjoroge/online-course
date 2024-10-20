<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Intake</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="intakes_add.php">
                <div class="form-group">
                    <label for="intake_name" class="col-sm-3 control-label">Intake Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="intake_name" name="intake_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start_date" class="col-sm-3 control-label">Start Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_date" class="col-sm-3 control-label">End Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Intakes</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="intakes_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="intake_name" class="col-sm-3 control-label">Intake Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="intake_name" name="intake_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start_date" class="col-sm-3 control-label">Start Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_date" class="col-sm-3 control-label">End Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="intakes_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE INTAKE</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>



     