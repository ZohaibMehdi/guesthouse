
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
    let todaynum = document.querySelector('#todayStatus h1');
    let todayin = document.querySelector('#todayCheckIN h1');
    let todayout = document.querySelector('#todayCheckOUT h1');

    // Today Status request
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'dash',
        },
        success: function(data){
            //console.log(data);
            let jData = JSON.parse(data);
            todaynum.innerHTML = jData[0].today_count;
        }
    });

    // Today In status request
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'todayIn',
        },
        success: function(data){
            //console.log(data);
            let jData = JSON.parse(data);
            todayin.innerHTML = jData[0].today_in;
        }
    });

    // Today Out status request
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'todayOut',
        },
        success: function(data){
            //console.log(data);
            let jData = JSON.parse(data);
            todayout.innerHTML = jData[0].today_out;
        }
    });
}

function dashboardDetail(){
  let today = document.getElementById('todayStatus');
  let todayin = document.getElementById('todayINStatus');
  let todayout = document.getElementById('todayOUTStatus');

  today.addEventListener('click',function(){
    let dt = 'dashboarddetail';
    getDetail(dt);
  });

  todayin.addEventListener('click',function(){
    let dt = 'today_in';
    getDetail(dt);
  });

  todayout.addEventListener('click',function(){
    let dt = 'today_out';
    getDetail(dt);
  });
}

function getDetail(data){
  $.ajax({
      type: 'POST',
      url: 'ajaxRequest.php',
      data: {
          sta: data,
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
    let num = document.querySelector('#dashDate h1');
    $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
            sta: 'datedash',
            date: value
        },
        success: function(data1){
            let jData = JSON.parse(data1)
            num.innerHTML = jData[0].date_count;
        }
    });
}

// Get detail of the date range status
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
  let c1 = document.getElementById('chartCheckIN').getContext('2d');
  let c2 = document.getElementById('chartCheckOUT').getContext('2d');
  let c3 = document.getElementById('monthlyChart').getContext('2d');
  chartsAjax(c1, c2, c3);
} // end Charts function

function chartsAjax(chart1, chart2, barChart){

  $.ajax({
      type: 'POST',
      url: 'ajaxRequest.php',
      data: {
          sta: 'bar',
      },
      success: function(data){
        let jData = JSON.parse(data);
        let year = [], month = [], monthName = [], monthTotal = [];
        //console.log(jData);

        for(let val =  0; val < jData.length; val++){
          year.push(jData[val].year);
          month.push(jData[val].month);
          monthName.push(jData[val].monthName);
          monthTotal.push(jData[val].total);
        }

        let chart = new Chart(barChart, {
            type: 'bar',
            data: {
                labels: monthName,
                datasets: [{
                    label: "Total Rooms",
                    data: monthTotal,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
      }
  }); // last week check out ajax end


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

          //console.log(jCheckIn);
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
          //console.log(jData);

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

}
