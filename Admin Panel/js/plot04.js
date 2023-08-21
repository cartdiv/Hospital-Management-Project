$(document).ready(function () {
  $.ajax({
    url: "http://localhost/hospital/Admin Panel/plot04.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var type = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        type.push(data[i].type);
        no.push(data[i].no_book);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: type,
        datasets: [
          {
            label: "Bed type",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas4");
      var barGraph = new Chart(ctx, {
        //   type: "bar",
        // type: "line",
        type: "pie",
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
