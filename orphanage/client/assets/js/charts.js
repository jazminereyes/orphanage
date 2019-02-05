(function () {
  'use strict';
  chart();
}());
function chart() {
  // RADAR CHART
  if ($('#radar-chart').length) {
    var radarChartData = {
      labels: [
        'Eating',
        'Drinking',
        'Sleeping',
        'Designing',
        'Coding',
        'Cycling',
        'Running'
      ],
      datasets: [
        {
          fillColor: 'rgba(220,220,220,0.2)',
          strokeColor: 'rgba(220,220,220,1)',
          pointColor: 'rgba(220,220,220,1)',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [
            65,
            59,
            90,
            81,
            56,
            55,
            40
          ]
        },
        {
          fillColor: 'rgba(226, 120, 93,0.2)',
          strokeColor: '#e2785d ',
          pointColor: '#e2785d ',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: '#e2785d ',
          data: [
            28,
            48,
            40,
            19,
            96,
            27,
            100
          ]
        }
      ]
    };
    if ($('#radar-chart').hasClass('animated')) {
      $('#radar-chart.animated').on('appear', function (event, $allAppearedElements) {
        if (!$('#radar-chart').hasClass('visible')) {
          var myRadarChart = new Chart(document.getElementById('radar-chart').getContext('2d')).Radar(radarChartData, {
            responsive: true,
            tooltipCornerRadius: 0
          });
        }
      });
    } else {
      var myRadarChart = new Chart(document.getElementById('radar-chart').getContext('2d')).Radar(radarChartData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    }
  }
  if ($('#radar-chart-sofware').length) {
    var radarChartSofwareData = {
      labels: [
        'Scalability',
        'Flexibility',
        'Usability',
        'Performance',
        'Stability',
        'Availability'
      ],
      datasets: [
        {
          fillColor: 'rgba(220,220,220,0.2)',
          strokeColor: 'rgba(220,220,220,1)',
          pointColor: 'rgba(220,220,220,1)',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [
            65,
            59,
            40,
            81,
            56,
            40
          ]
        },
        {
          fillColor: 'rgba(93, 171, 226,0.2)',
          strokeColor: '#5DABE2 ',
          pointColor: '#5DABE2 ',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: '#5DABE2 ',
          data: [
            88,
            78,
            46,
            69,
            86, 
            56
          ]
        }
      ]
    };
    if ($('#radar-chart-sofware').hasClass('animated')) {
      $('#radar-chart-sofware.animated').on('appear', function (event, $allAppearedElements) {
        if (!$('#radar-chart-sofware').hasClass('visible')) {
          var myRadarChartSofware = new Chart(document.getElementById('radar-chart-sofware').getContext('2d')).Radar(radarChartSofwareData, {
            responsive: true,
            tooltipCornerRadius: 0
          });
        }
      });
    } else {
      var myRadarChartSofware = new Chart(document.getElementById('radar-chart-sofware').getContext('2d')).Radar(radarChartSofwareData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    }
  }

  // LINE CHART
  if ($('#line-chart').length) {
    var randomScalingFactor = function () {
      return Math.round(Math.random() * 100);
    };
    var lineChartData = {
      labels: [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July'
      ],
      datasets: [
        {
          fillColor: 'rgba(220,220,220,0.2)',
          strokeColor: 'rgba(220,220,220,1)',
          pointColor: 'rgba(220,220,220,1)',
          pointStrokeColor: '#fff',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: [
            65,
            59,
            80,
            81,
            56,
            55,
            40
          ]
        },
        {
          fillColor: 'rgba(226, 120, 93,0.2)',
          strokeColor: 'rgba(226, 120, 93,1)',
          pointColor: 'rgba(226, 120, 93,1)',
          pointStrokeColor: '#e2785d',
          pointHighlightFill: '#e2785d',
          pointHighlightStroke: 'rgba(226, 120, 93,1)',
          data: [
            28,
            48,
            40,
            19,
            86,
            27,
            90
          ]
        }
      ]
    };
    if ($('#line-chart').hasClass('animated')) {
      $('#line-chart.animated').on('appear', function (event, $allAppearedElements) {
        if (!$('#line-chart').hasClass('visible')) {
          window.myPie = new Chart(document.getElementById('line-chart').getContext('2d')).Line(lineChartData, {
            responsive: true,
            tooltipCornerRadius: 0
          });
        }
      });
    } else {
      window.myPie = new Chart(document.getElementById('line-chart').getContext('2d')).Line(lineChartData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    }
  }

  // DONUT CHART
  if ($('#donut-chart').length) {
    var donutData = [
      {
        value: 300,
        color: 'rgba(226, 120, 93,0.9)',
        highlight: 'rgba(226, 120, 93,1)',
        label: 'Orange'
      },
      {
        value: 40,
        color: 'rgba(54, 173, 199,0.9)',
        highlight: 'rgba(54, 173, 199,1)',
        label: 'Blue'
      },
      {
        value: 100,
        color: 'rgba(255, 200, 112,0.9)',
        highlight: 'rgba(255, 200, 112,1)',
        label: 'Yellow'
      },
      {
        value: 50,
        color: 'rgba(27, 184, 152,0.9)',
        highlight: 'rgba(27, 184, 152,1)',
        label: 'Green'
      },
      {
        value: 120,
        color: 'rgba(97, 103, 116,0.9)',
        highlight: 'rgba(97, 103, 116,1)',
        label: 'Dark Grey'
      }
    ];
    if ($('#donut-chart').hasClass('animated')) {
      $('#donut-chart.animated').on('appear', function (event, $allAppearedElements) {
        if (!$('#donut-chart').hasClass('visible')) {
          window.myPie = new Chart(document.getElementById('donut-chart').getContext('2d')).Pie(donutData, {
            responsive: true,
            tooltipCornerRadius: 0
          });
        }
      });
    } else {
      window.myPie = new Chart(document.getElementById('donut-chart').getContext('2d')).Pie(donutData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    }
  }
  // POLAR CHART
  if ($('#polar-chart').length) {
    var polarData = [
      {
        value: 80,
        color: 'rgba(27, 184, 152,0.9)',
        highlight: 'rgba(27, 184, 152,1)',
        label: 'Green'
      },
      {
        value: 120,
        color: 'rgba(226, 120, 93,0.9)',
        highlight: 'rgba(226, 120, 93,1)',
        label: 'Orange'
      },
      {
        value: 80,
        color: 'rgba(54, 173, 199,0.9)',
        highlight: 'rgba(54, 173, 199,1)',
        label: 'Blue'
      },
      {
        value: 60,
        color: 'rgba(201, 98, 95,0.9)',
        highlight: 'rgba(201, 98, 95,1)',
        label: 'Red'
      },
      {
        value: 60,
        color: 'rgba(97, 103, 116,0.9)',
        highlight: 'rgba(97, 103, 116,1)',
        label: 'Dark Grey'
      }
    ];
    if ($('#polar-chart').hasClass('animated')) {
      $('#polar-chart.animated').on('appear', function (event, $allAppearedElements) {
        if (!$('#polar-chart').hasClass('visible')) {
          window.myPolarArea = new Chart(document.getElementById('polar-chart').getContext('2d')).PolarArea(polarData, {
            responsive: true,
            tooltipCornerRadius: 0
          });
        }
      });
    } else {
      window.myPolarArea = new Chart(document.getElementById('polar-chart').getContext('2d')).PolarArea(polarData, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    }
  }
}