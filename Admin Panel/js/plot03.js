$(document).ready(function () {
  $.ajax({
    url: "http://localhost/hospital/Admin Panel/plot03.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var hos = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        hos.push(data[i].name);
        no.push(data[i].no_hos);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: hos,
        datasets: [
          {
            label: "No of Hospitals",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas");
      var barGraph = new Chart(ctx, {
        // type: "bar",
        type: "horizontalBar",
        // type: "line",
        data: chartdata,
      });
    },
    error: function (data) {
      console.log(data);
    },
  });

  function color() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    var rgba = "rgba(" + r + "," + g + "," + b + ",1.0)";
    return rgba;
  }
});
