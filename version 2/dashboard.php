<?php
require_once 'includes/header.php';
require_once 'checkinout.php';
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h3>Last week total check in</h3>
      <canvas id="chartCheckIN"></canvas>
    </div>
    <div class="col">
      <h3>Last week total check out</h3>
      <canvas id="chartCheckOUT"></canvas>
    </div>
  </div>
</div>



<div class="container">
  <div id="dash">
    <h1>Today</h1>
    <h4 data-toggle="modal" data-target="#dashboardModal"></h4>
  </div>

  <div id='dashDate'>
    <h1>Select Date</h1>
    <h4 data-toggle="modal" data-target="#dashDateModal"></h4>
    <input type='date' id='dateDash'/>
  </div>
</div>

<!-- Dashboard Modal -->
<div class="container">
  <div class="modal fade" id="dashboardModal">
    <div class="modal-dialog" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Selected date range data</h5>
        </div> <!-- End modal header -->

        <div class="modal-body">
          <div class="container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Room No</th>
                        <th>Check IN</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
        </div> <!-- End modal Body -->
        <div class="modal-footer">
          <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> <!-- End modal footer -->
      </div> <!-- End modal content -->
    </div> <!-- End modal dialog -->
  </div> <!-- End modal -->
</div> <!-- End div container -->


<!-- Date Dash Modal -->
<div class="container">
  <div class="modal fade" id="dashDateModal">
    <div class="modal-dialog" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Selected date range data</h5>
        </div> <!-- End modal header -->

        <div class="modal-body">
          <div class="container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Room No</th>
                        <th>Check IN</th>
                        <th>Check Out</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
        </div> <!-- End modal Body -->
        <div class="modal-footer">
          <button type="button" id="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> <!-- End modal footer -->
      </div> <!-- End modal content -->
    </div> <!-- End modal dialog -->
  </div> <!-- End modal -->
</div> <!-- End div container -->




<div class="container">
  <div class="row">
    <div class="col">
      <h3>Last week total check in</h3>
      <canvas id="myChart"></canvas>
    </div>
    <div class="col">

    </div>
  </div>
</div>

<?php
require_once 'includes/footer.php';
?>
