$(document).ready(function () {
  // Xử lý phân trang
  $(".btnPageNum").click(function (e) {
    e.preventDefault();
    let page = $(this).text();
    $(".btnPageNum").removeClass("active");
    $(this).addClass("active");
    $.ajax({
      url: "../admin/handle/User/getTableUser.php",
      type: "POST",
      data: {
        page: page,
      },
      success: function (res) {
        $("tbody").html(res);
      },
    });
  });
  // Xử lý thêm user
  $("#formAddUser").submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajax({
      type: "POST",
      url: "handleAddUser.php",
      data: data,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == "success")
          window.location.href = "../../dashboard.php";
      },
    });
  });

  // Xử lý edit user
  $("#formEditUser").submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajax({
      type: "POST",
      url: "handleEditUser.php",
      data: data,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == "success")
          window.location.href = "../../dashboard.php";
      },
    });
  });

  // Xử lý xóa user
  $("tbody").on("click", ".btnDelete", function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var yes = confirm("Bạn có chắc chắn muốn xóa bài viết này?");
    if (!yes) return;
    $.ajax({
      type: "POST",
      url: "handle/User/handleDeleteUser.php",
      data: {
        id: id,
      },
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == "success") {
          location.reload();
        }
      },
    });
  });
});
