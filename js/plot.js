$(document).ready(function () {
  $.ajax({
    url: "http://localhost/busbooking/plot.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var city = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        city.push(data[i].city);
        no.push(data[i].no_of_user);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: city,
        datasets: [
          {
            label: "Our Users in UK",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas");
      var barGraph = new Chart(ctx, {
        type: "bar",
        // type: "horizontalBar",
        // type: "pie",
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
