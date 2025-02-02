var salesData = {
  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
  datasets: [
    {
      label: "Front",
      fillColor: "rgba(247, 80, 90, 0.0)",
      strokeColor: "#F7505A",
      pointColor: "#F7505A",
      pointStrokeColor: "rgba(0,0,0,0.2)",
      pointHighlightStroke: "rgba(225,225,225,0.75)",
      data: [34, 52, 19, 100, 70, 93, 33, 90, 96,12]
    },
    {
      label: "Middle",
      fillColor: "rgba(255, 172, 100, 0.0)",
      strokeColor: "rgba(255, 172, 100, 1)",
      pointColor: "rgba(255, 172, 100, 1)",
      pointStrokeColor: "rgba(0,0,0,0.2)",
      pointHighlightStroke: "rgba(225,225,225,0.75)",
      data: [34, 52, 39, 46, 70, 93, 33, 50, 96,12]
    },
    {
      label: "Back",
      fillColor: "rgba(19, 71, 34, 0.0)",
      strokeColor: "rgba(88, 188, 116, 1)",
      pointColor: "rgba(88, 188, 116, 1)",
      pointStrokeColor: "rgba(0,0,0,0.2)",
      pointHighlightStroke: "rgba(225,225,225,0.75)",
      data: [34, 12, 39, 100, 70, 93, 33, 70, 96,12]
    }
  ]
};
var ctx = document.getElementById("salesData").getContext("2d");
window.myLineChart = new Chart(ctx).Line(salesData, {
  pointDotRadius : 6,
  pointDotStrokeWidth : 2,
  datasetStrokeWidth : 3,
  scaleShowVerticalLines: false,
  scaleGridLineWidth : 2,
  scaleShowGridLines : true,
  scaleGridLineColor : "rgba(225, 255, 255, 0.015)",
  scaleOverride: true,
  scaleSteps: 10,
  scaleStepWidth: 10,
  scaleStartValue: 0,

  responsive: true

});

var NetPromoterScore = new ProgressBar.Circle('#creditSales', {
  color: '#F7505A',
  strokeWidth: 5,
  trailWidth: 3,
  duration: 1000,
  text: {
    value: '0%'
  },
  step: function(state, bar) {
    bar.setText((bar.value() * 100).toFixed(0) + "%");
  }
});
var PeerPromoterScore = new ProgressBar.Circle('#channelSales', {
  color: '#e88e3c',
  strokeWidth: 5,
  trailWidth: 3,
  duration: 1000,
  text: {
    value: '0%'
  },
  step: function(state, bar) {
    bar.setText((bar.value() * 100).toFixed(0) + "%");
  }
});
var RawNetPromoter = new ProgressBar.Circle('#directSales', {
  color: '#2bab51',
  strokeWidth: 5,
  trailWidth: 3,
  duration: 1000,
  text: {
    value: '0%'
  },
  step: function(state, bar) {
    bar.setText((bar.value() * 100).toFixed(0) + "%");
  }
});
NetPromoterScore.animate(0.56);
PeerPromoterScore.animate(0.64);
RawNetPromoter.animate(0.51);