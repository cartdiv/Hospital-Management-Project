$(document).ready(function () {
  $.ajax({
    url: "http://localhost/busbooking/plot2.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var feedback = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        feedback.push(data[i].feedback);
        no.push(data[i].no_of_user);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: feedback.reverse(),
        datasets: [
          {
            label: "Our Users Rating",
            backgroundColor: colors,
            data: no.reverse(),
          },
        ],
      };
      var ctx = $("#mycanvas2");
      var barGraph = new Chart(ctx, {
        // type: "bar",
        type: "horizontalBar",
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
