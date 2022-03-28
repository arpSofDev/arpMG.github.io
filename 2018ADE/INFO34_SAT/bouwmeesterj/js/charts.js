// graphs - credit to chart.js



// line graph
var lineChartData = {
  labels: ["14/05/2017",
          "21/05/2017","28/05/2017","4/06/2017","11/06/2017",
          "18/06/2017","25/06/2017","2/07/2017","9/07/2017",
          "16/07/2017","23/07/2017","30/07/2017","6/08/2017",
          "13/08/2017","20/08/2017","27/08/2017","3/09/2017",
          "10/09/2017","17/09/2017","24/09/2017","1/10/2017",
          "8/10/2017","15/10/2017","22/10/2017","29/10/2017",
          "5/11/2017","12/11/2017","19/11/2017","26/11/2017",
          "3/12/2017","10/12/2017","17/12/2017","24/12/2017",
          "31/12/2017","7/01/2018","14/01/2018","21/01/2018",
          "28/01/2018","4/02/2018","11/02/2018","18/02/2018",
          "25/02/2018","4/03/2018","11/03/2018","18/03/2018",
          "25/03/2018","1/04/2018","8/04/2018","15/04/2018",
          "22/04/2018","29/04/2018","6/05/2018",],
  datasets: [{
    label: 'Bitcoin Price',
    borderColor: window.chartColors.red,
    backgroundColor: window.chartColors.red,
    fill: false,
    data: [1760.03,2039.08,2059.53,
          2535.45,2897.36,2642.5,2573.94,2419.08,2555.82,2018.56,2823.79,
          2722.54,3278.08,3892.27,4145.42,4354.81,4591.78,4283.53,3689.40,
          3771.92,4348.09,4412.17,5765.86,6020.30,5735.73,7379.54,6295.68,
          7761.98,8730.57,10908.85,14486.62,19193.72,14436.77,12618.55,17095.19,
          14191.06,12739.89,11417.62,9184.39,8508.35,11083.01,9647.38,11423.62,
          8764.24,7858.96,8527.32,6946.30,6898.57,8021.41,8908.73,9347.32,
          9822.50],
    yAxisID: 'y-axis-1',
  }, {
    label: 'Google Search Popularity',
    borderColor: window.chartColors.blue,
    backgroundColor: window.chartColors.blue,
    fill: false,
    data: [12,
          19,13,12,13,11,11,9,10,
          12,11,15,15,20,16,17,18,
          21,16,13,12,19,19,21,28,
          29,31,28,67,91,87,100,64,
          48,47,57,38,40,49,28,24,
          20,20,20,18,18,17,16,14,
          15,13,12],
    yAxisID: 'y-axis-2'
  }]
};


// pie 1
var config1 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						73,27
					],
          backgroundColor: [
             "#0052cc",
             "#FFF",
          ],
					label: 'Dataset 1'
				}],
				labels: [
					'Asset','Currency',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
          labels: {
             fontColor: '#FFF'
          }
				},
				title: {
					display: true,
					text: 'Is Bitcoin an asset or a currency?',
          fontColor: '#FFF',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

// pie 2
var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						41,59
					],
          backgroundColor: [
             "#0052cc",
             "#FFF",
          ],
					label: 'Dataset 2'
				}],
				labels: [
					'Yes','No',
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
          labels: {
             fontColor: '#FFF'
          }
				},
				title: {
					display: true,
					text: 'Would you invest?',
          fontColor: '#FFF',
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

// bar 1
const barCHART = document.getElementById("bar1");
var barChart = new Chart(barCHART, {
  type: 'bar',
  data: {
    labels: ["Future technology", "Profit", "Usefulness"],
    datasets: [{
    label: '',
    data: [57,29,14],
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)'
    ],
    borderColor: [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)'
    ],
    borderWidth: 1

    }]

  },
  options: {
    title: {
      display: true,
      text: 'Reasons to invest in Bitcoin'
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  }

});

// bar 2
const barCHART2 = document.getElementById("bar2");
var barChart2 = new Chart(barCHART2, {
  type: 'bar',
  data: {
    labels: ["Safety", "Fluctuations", "Price", "Usefulness"],
    datasets: [{
    label: '',
    data: [32,35,13,20],
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(204, 0, 152, 0.2)',
    ],
    borderColor: [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(204, 0, 152, 1)',
    ],
    borderWidth: 1

    }]

  },
  options: {
    title: {
      display: true,
      text: 'Reasons to not invest in Bitcoin'
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero:true
        }
      }]
    }
  }

});


// draw graphs
window.onload = function() {

  // draw pie 1
   var ctx_pie1 = document.getElementById('pie1').getContext('2d');
   window.myDoughnut = new Chart(ctx_pie1, config1);

   // draw pie 2
   var ctx_pie2 = document.getElementById('pie2').getContext('2d');
   window.myDoughnut = new Chart(ctx_pie2, config2);




  // draw line graph
  var ctx_line = document.getElementById('line').getContext('2d');
  window.myLine = Chart.Line(ctx_line, {
    data: lineChartData,
    options: {

      responsive: true,
      hoverMode: 'index',
      stacked: false,
      title: {
        display: true,
        text: 'Bitcoin price vs Google Search Popularity'
      },
      scales: {
        yAxes: [{
          type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
          display: true,
          position: 'left',
          id: 'y-axis-1',
        }, {
          type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
          display: true,
          position: 'right',
          id: 'y-axis-2',

          // grid line settings
          gridLines: {
            drawOnChartArea: false, // only want the grid lines for one axis to show up
          },
        }],
      }
    }
  });


};
