$(document).ready(function () {
  // Xử lý content của dashboard
  $(".btnDashboard").click(function (e) {
    e.preventDefault();
    var dashboardContent = $("#dashboardContent");
    if ($(this).text().trim() === "Post") {
      $.ajax({
        url: "posts.php",
        type: "GET",
        data: { isHaveHeader: "None" },
        success: function (res) {
          dashboardContent.html(res);
        },
      });
    } else if ($(this).text().trim() === "User") {
      $.ajax({
        url: "users.php",
        type: "GET",
        data: { isHaveHeader: "None" },
        success: function (res) {
          dashboardContent.html(res);
        },
      });
    } else if ($(this).text().trim() === "Category") {
      $.ajax({
        url: "category.php",
        type: "GET",
        success: function (res) {
          dashboardContent.html(res);
        },
      });
    }
  });

  // Xử lý chart
  var ctx = document.getElementById("pie-chart").getContext("2d");
  var totalUser = +$("span.quantityUser").text();
  var totalPost = +$("span.quantityPost").text();
  var totalCategory = +$("span.quantityCategory").text();
  var data = {
    labels: ["User", "Post", "Category"],
    datasets: [
      {
        data: [totalUser, totalPost, totalCategory],
        backgroundColor: [
          "rgba(255, 99, 132, .9)",
          "rgba(54, 162, 235, .9)",
          "rgba(255, 205, 86, .9)",
        ],
      },
    ],
  };

  var options = {
    responsive: true,
    maintainAspectRatio: false,
  };

  var pieChart = new Chart(ctx, {
    type: "pie",
    data: data,
    options: options,
  });
});
