$(document).ready(function () {
  $.ajax({
    url: "http://localhost/hospital/Admin Panel/plot02.php",
    method: "GET",
    success: function (data) {
      //   console.log(data);
      var doctor = [];
      var no = [];
      var colors = [];
      for (var i in data) {
        doctor.push(data[i].name);
        no.push(data[i].no_doc);
        colors.push(color());
      }
      //   console.log(score);
      var chartdata = {
        labels: doctor,
        datasets: [
          {
            label: "Doctor Appointment",
            backgroundColor: colors,
            data: no,
          },
        ],
      };
      var ctx = $("#mycanvas2");
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
