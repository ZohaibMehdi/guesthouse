<?php
require_once 'includes/header.php';
//require_once 'checkinout.php';
?>


<section class="container" id="statuses">

  <article class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card" style="text-align: center;">
        <div class="card-body" id='todayStatus'>
          <h5 class="card-title"> Today Status </h5>
          <h1 class="card-text"> </h1>
          <a href="#" class="btn btn-primary" id="todayStatus" data-toggle="modal" data-target="#dashboardModal">Get Details</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card" style="text-align: center;">
        <div class="card-body" id="todayCheckIN">
          <h5 class="card-title"> Today Check In </h5>
          <h1 class="card-text">  </h1>
          <a href="#" class="btn btn-primary" id="todayINStatus" data-toggle="modal" data-target="#dashboardModal">Get Details</a>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6">
      <div class="card" style="text-align: center;">
        <div class="card-body" id="todayCheckOUT">
          <h5 class="card-title"> Today Check Out </h5>
          <h1 class="card-text"> </h1>
          <a href="#" class="btn btn-primary" id="todayOUTStatus" data-toggle="modal" data-target="#dashboardModal">Get Details</a>
        </div>
      </div>
    </div>
  </article> <!-- End Row -->

  <article class="row">
    <div class="col-lg-12">
      <div class="card" style="text-align: center;">
        <div class="card-body" id="dashDate">
          <h5 class="card-title"> Select Date </h5>
          <input type='date' id='dateDash'/>
          <h1 class="card-text"> </h1>
          <a href="#" class="btn btn-primary" id="dateDetail" data-toggle="modal" data-target="#dashDateModal">Get Details</a>
        </div>
      </div>
    </div>
    <!-- <div id='dashDate'>
      <h1>Select Date</h1>
      <h4 data-toggle="modal" data-target="#dashDateModal"></h4>
      <input type='date' id='dateDash'/>
    </div> -->
  </article>

</section> <!-- End Container -->



<section class="container" id="chartData">

  <article class="row">
    <div class="col">
      <h3>Last week total check in</h3>
      <canvas id="chartCheckIN"></canvas>
    </div>
    <div class="col">
      <h3>Last week total check out</h3>
      <canvas id="chartCheckOUT"></canvas>
    </div>
  </article>

  <article class="row">
    <div class="col">
      <h3>Monthly Stats</h3>
      <canvas id="monthlyChart"></canvas>
    </div>
  </article>

</section>


<!-- Dashboard Modal -->
<div class="container">
  <div class="modal fade" id="dashboardModal">
    <div class="modal-dialog" >
      <div class="modal-content" style="width: 150%;">

        <div class="modal-header">
          <h5 class="modal-title">Todays status Detail</h5>
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
      <div class="modal-content" style="width: 160%;">

        <div class="modal-header">
          <h5 class="modal-title">Selected date range detail</h5>
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





<?php
require_once 'includes/footer.php';
?>
