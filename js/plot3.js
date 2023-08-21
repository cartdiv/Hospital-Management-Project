$(document).ready(function () {
  $.ajax({
    url: "http://localhost/busbooking/plot3.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var des = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        des.push(data[i].destination);
        no.push(data[i].no_of_user);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: des,
        datasets: [
          {
            label: "Demand Place",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas3");
      var barGraph = new Chart(ctx, {
        // type: "bar",
        type: "line",
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
