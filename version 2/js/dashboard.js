
$(document).ready(function(){
    runDash();
    dashboardDetail();
    var date = document.getElementById('dateDash');
    if(date){
      date.addEventListener('change', function(){
          let val = date.value;
          daterange(val);
          dateRangeDetail(val);
      });
    }
    chart();
});



function runDash(){
    let num = document.querySelector('#dash h4');
    //console.log(num);
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'dash',
        },
        success: function(data){
            //console.log(data);
            let jData = JSON.parse(data);
            num.innerHTML = jData[0].today_count;
        }
    });
}

function dashboardDetail(){
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'dashboarddetail',
        },
        success: function(data){
            let tbody = document.querySelector('#dashboardModal tbody');
            while(tbody.firstChild){
              tbody.removeChild(tbody.firstChild)
            }
            let jData = JSON.parse(data);

            for(let val =  0; val < jData.length; val++){
              let tr = document.createElement('tr');
              tbody.appendChild(tr);
              for (let valkey = 0; valkey < Object.keys(jData[val]).length; valkey++) {
                let th1 = document.createElement('th');
                th1.innerHTML = jData[val].name;
                tr.appendChild(th1);
                let th2 = document.createElement('th');
                th2.innerHTML = jData[val].cnic;
                tr.appendChild(th2);
                let th3 = document.createElement('th');
                th3.innerHTML = jData[val].room;
                tr.appendChild(th3);
                let th4 = document.createElement('th');
                th4.innerHTML = jData[val].checkin;
                tr.appendChild(th4);
                let th5 = document.createElement('th');
                th5.innerHTML = jData[val].checkout;
                tr.appendChild(th5);
                break;
              }
            }
        }
    });
}


function daterange(value){
    //console.log(value);
    let num = document.querySelector('#dashDate h4');
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'datedash',
            date: value
        },
        success: function(data1){
            //console.log(data1);
            let jData = JSON.parse(data1)
            num.innerHTML = jData[0].date_count;
        }
    });
}


function dateRangeDetail(date){
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'datedashdetail',
            date: date
        },
        success: function(data){
          createTHs(data);
        }
    });
}


function createTHs(data){
  let tbody = document.querySelector('#dashDateModal tbody');
  let jData = JSON.parse(data);

  while(tbody.firstChild){
    tbody.removeChild(tbody.firstChild)
  }

  for(let val =  0; val < jData.length; val++){
    let tr = document.createElement('tr');
    tbody.appendChild(tr);
    for (let valkey = 0; valkey < Object.keys(jData[val]).length; valkey++) {
      let th1 = document.createElement('th');
      th1.innerHTML = jData[val].name;
      tr.appendChild(th1);
      let th2 = document.createElement('th');
      th2.innerHTML = jData[val].cnic;
      tr.appendChild(th2);
      let th3 = document.createElement('th');
      th3.innerHTML = jData[val].room;
      tr.appendChild(th3);
      let th4 = document.createElement('th');
      th4.innerHTML = jData[val].checkin;
      tr.appendChild(th4);
      let th5 = document.createElement('th');
      th5.innerHTML = jData[val].checkout;
      tr.appendChild(th5);
      break;
    }
  }
}


function chart(){
  var ctx = document.getElementById('chartCheckIN').getContext('2d');
  var ctx2 = document.getElementById('chartCheckOUT').getContext('2d');
  var ctx3 = document.getElementById('myChart').getContext('2d');
  chartsAjax(ctx, ctx2, ctx3);
} // end Charts function

function chartsAjax(chart1, chart2, chart3){


  /**       Last week checkin    **/
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'chart',
        },
        success: function(data){
          let jData = JSON.parse(data);
          let jCheckIn = [], jTotalIn = [];

          for(let val =  0; val < jData.length; val++){
            jCheckIn.push(jData[val].checkin);
            jTotalIn.push(jData[val].total_in);
          }

          console.log(jCheckIn);
          let chart = new Chart(chart1, {
              type: 'line',
              data: {
                  labels: jCheckIn,
                  datasets: [{
                      label: "Rooms",
                      borderColor: 'rgb(255, 99, 132)',
                      data: jTotalIn,
                      fill: false,
                      pointRadius: 8,
                      pointBackgroundColor: 'rgb(255, 99, 132)',
                      pointHoverRadius: 10,
                      pointHoverBackgroundColor: 'rgb(247, 2, 54)'
                  }]
              },
          });
        }
    }); // last week check in ajax end



  /**       Last week check out    **/
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'chart2',
        },
        success: function(data){
          let jData = JSON.parse(data);
          let jCheckOut = [], jTotalIn = [];
          console.log(jData);

          for(let val =  0; val < jData.length; val++){
            jCheckOut.push(jData[val].checkout);
            jTotalIn.push(jData[val].total_out);
          }

          let chart = new Chart(chart2, {
              type: 'line',
              data: {
                  labels: jCheckOut,
                  datasets: [{
                      label: "Rooms",
                      borderColor: 'rgb(255, 99, 132)',
                      data: jTotalIn,
                      fill: false,
                      pointRadius: 8,
                      pointBackgroundColor: 'rgb(255, 99, 132)',
                      pointHoverRadius: 10,
                      pointHoverBackgroundColor: 'rgb(247, 2, 54)'
                  }]
              },
          });
        }
    }); // last week check out ajax end



    let chart = new Chart(chart3, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: "Rooms",
                borderColor: 'rgb(255, 99, 132)',
                data: [12, 19, 3, 5, 2, 3],
                fill: false,
                pointRadius: 8,
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointHoverRadius: 10,
                pointHoverBackgroundColor: 'rgb(247, 2, 54)'
            }]
        },
    });
}
