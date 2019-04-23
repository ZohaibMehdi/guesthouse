<?php
require_once 'includes/header.php';
require_once 'checkinout.php';
?>

<!-- Adding new guest div  -->
<div class="container">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
    Add new guest
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div> <!-- End modal header -->

        <div class="modal-body" id="modalBody">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" id="formAjax" method="post">

            <div class="form-group">
              <label for="guest-name" class="col-form-label">Full Name</label>
              <input type="text" class="form-control" id="guest-name" name="gName" required>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="guest-cnic" class="col-form-label">CNIC</label>
                  <input type="text" class="form-control" id="guest-cnic" name="gCNIC" required>
                </div>

                <div class="col">
                  <label for="guest-mob" class="col-form-label">Mobile number</label>
                  <input type="text" class="form-control" id="guest-mob" name="gMob">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="guest-address" class="col-form-label">Address</label>
              <textarea class="form-control" id="guest-address" name="gAddress"></textarea>
            </div>

            <div class="form-group">
              <label for="guest-company" class="col-form-label">Company / Purpose</label>
              <input type="text" class="form-control" id="guest-company" name="gCompany">
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="guest-checkin" class="col-form-label">Check IN</label>
                  <input type="date" class="form-control" id="guest-checkin" name="gIN" required>
                </div>
                <div class="col">
                  <label for="guest-checkout" class="col-form-label">Check OUT</label>
                  <input type="date" class="form-control" id="guest-checkout" name="gOUT">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="guest-room" class="col-form-label">Room Number</label>
              <select name="gRoomNO" class="form-control" id="guest-room" required>
                <option value="">Select Room #</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>
            </div>
          </form>

        </div> <!-- End modal Body -->

        <div class="modal-footer">
          <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="saveData" class="btn btn-primary">Save changes</button>
        </div> <!-- End modal footer -->

      </div> <!-- End modal content -->
    </div> <!-- End modal dialog -->
  </div> <!-- End modal -->
</div> <!-- End new guest div container -->


<!-- Display list of guest in JQuery Table -->
<div class="container" style="margin-top: 25px;">
  <table id="table_id" class="table table-bordered table-hover">
      <thead class="thead-dark">
          <tr>
              <th>Name</th>
              <th>CNIC</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Room No</th>
              <th>Check IN</th>
              <th>Check Out</th>
              <th>Purpose / Company</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $check = new CheckINOUT;
          foreach($check->getAll() as $val){
        ?>
        <tr>
          <td> <?php echo $val['name']; ?> </td>
          <td> <?php echo $val['cnic']; ?> </td>
          <td> <?php echo $val['mobile']; ?> </td>
          <td> <?php echo $val['address']; ?> </td>
          <td> <?php echo $val['room']; ?> </td>
          <td> <?php echo $val['checkin']; ?> </td>
          <td> <?php echo $val['checkout']; ?> </td>
          <td> <?php echo $val['company']; ?> </td>
          <td> <button id = "editGuest" data-id = "<?php echo $val['id'];?>" type="button" class="btn btn-warning edit_guest" data-toggle="modal" data-target="#edit_guest">Edit</button></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
  </table>
</div> <!-- End guest list table -->



<!-- Display Edit Guest modal  -->
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="edit_guest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div> <!-- End modal header -->

        <div class="modal-body" id="modalBodyEdit">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validationEdit" id="formAjaxEdit" method="post">

            <div class="form-group">
              <label for="guest-name" class="col-form-label">Full Name</label>
              <input type="text" class="form-control" id="guestEdit-name" name="gName" required>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="guest-cnic" class="col-form-label">CNIC</label>
                  <input type="text" class="form-control" id="guestEdit-cnic" name="gCNIC" required>
                </div>

                <div class="col">
                  <label for="guest-mob" class="col-form-label">Mobile number</label>
                  <input type="text" class="form-control" id="guestEdit-mob" name="gMob">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="guest-address" class="col-form-label">Address</label>
              <textarea class="form-control" id="guestEdit-address" name="gAddress"></textarea>
            </div>

            <div class="form-group">
              <label for="guest-company" class="col-form-label">Company / Purpose</label>
              <input type="text" class="form-control" id="guestEdit-company" name="gCompany">
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col">
                  <label for="guest-checkin" class="col-form-label">Check IN</label>
                  <input type="date" class="form-control" id="guestEdit-checkin" name="gIN" required>
                </div>
                <div class="col">
                  <label for="guest-checkout" class="col-form-label">Check OUT</label>
                  <input type="date" class="form-control" id="guestEdit-checkout" name="gOUT">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="guest-room" class="col-form-label">Room Number</label>
              <select name="gRoomNO" class="form-control" id="guestEdit-room" required>
                <option value="">Select Room #</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>
            </div>
            <input type="hidden" id="guestEdit-ID" >
          </form>

        </div> <!-- End modal Body -->

        <div class="modal-footer">
          <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="saveEditData" class="btn btn-success">Save Edit</button>
        </div> <!-- End modal footer -->

      </div> <!-- End modal content -->
    </div> <!-- End modal dialog -->
  </div> <!-- End modal -->
</div> <!-- End Edit Guest div container -->


<?php
require_once 'includes/footer.php';
?>
