$(document).ready(function () {
  $.ajax({
    url: "http://localhost/busbooking/plot4.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var bus = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        bus.push(data[i].bus);
        no.push(data[i].no_of_user);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: bus,
        datasets: [
          {
            label: "Demand Bus",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas4");
      var barGraph = new Chart(ctx, {
        type: "bar",
        // type: "line",
        // type: "doughnut",
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
