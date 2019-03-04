
var xhr = new XMLHttpRequest();
var response, myRes;
var dateArr = new Array();
var weatherArr = new Array();
var weatherArrTemp = new Array();
var speedArr = new Array();

//to get data(city) from user and get api json file 
function getWeatherData() {
    var API_KEY = "&appid=1afaa7bb7768fa072efe7edd746a72ae";
    // var API_URL = "https://api.openweathermap.org/data/2.5/weather?q=";
    var API_URL = "https://api.openweathermap.org/data/2.5/forecast?q=";
    var CITY = document.getElementById("city").value;
    var URL = API_URL.concat(CITY,API_KEY);
    getWeather(URL);
}

function getWeather(URL) {
        xhr.onload = function () {

        // Process our return data
        if (xhr.status >= 200 && xhr.status < 300) {
            response = xhr.responseText;
            myRes = JSON.parse(response);
            console.log(myRes);
            console.log(document.getElementById("city").value);  
            getDataArr();
            getChart();
            getTable();
        } else {
            console.log(document.getElementById("city").value);
            console.log('The request failed!');
        }
    };
    
    xhr.open('GET', URL);
    xhr.send();   
}

//change the response file from api endpoint to array
//weatherArr - list of weather descriptions on the respective date
//dateArr - date of the weather
//speedArr - speed of wind on the respective date
function getDataArr() {
    // for(var i=0; i<myRes.list.length; i++) {
    //     weatherArr[i] = myRes.list[i].weather[0].description;
    // }

    for(var i=0; i<myRes.list.length; i++) {
        dateArr[i] = myRes.list[i].dt_txt;
    }

    for(var i=0; i<myRes.list.length; i++) {
        speedArr[i] = myRes.list[i].main.temp;
    }

    var j=0;
    for(var i=0; i<myRes.list.length; i++) {
        for(j; j<2*myRes.list.length; j++) {
            if(j%2==0) {
                weatherArrTemp[j] = myRes.list[i].dt_text;
            } else {
                weatherArrTemp[j] = myRes.list[i].weather[0].description;
                break;
            }
            j++;
        }
        weatherArr.push(weatherArrTemp); 
    }
    console.log(weatherArr.toString());
}

//taken from chart.js
//show a chart of date to temperature
function getChart() {
var ctx = document.getElementById("myChart").getContext('2d');
document.getElementById("myChart").setAttribute("style", "border-style: solid");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dateArr,
        datasets: [{
            label: 'Temperature chart',
            data: speedArr,
            backgroundColor: "red",
            borderColor: "red",
            fill: false,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}
var testArr = [
    ['Mike', '$10,000'],
    ['Jim', '$8,000'],
    ['Alice', '$12,500'],
    ['Bob', '$7,000']
  ];

//Table to show date and weather description
function getTable() {
    google.charts.load('current', {
        'packages': ['table']
      });
      google.charts.setOnLoadCallback(drawTable);
  
      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('string', 'Predicted Weather');
        data.addRows(testArr);
  
        var table = new google.visualization.Table(document.getElementById('table_div'));
  
        table.draw(data, {
          showRowNumber: true,
          width: '100%',
          height: '100%'
        });
      }
  }





