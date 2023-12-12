$(document).ready(function () {
  // Xử lý phân trang
  $(".btnPageNum").click(function (e) {
    e.preventDefault();
    let page = $(this).text();
    $(".btnPageNum").removeClass("active");
    $(this).addClass("active");
    $.ajax({
      url: "../admin/handle/Post/getTablePost.php",
      type: "POST",
      data: {
        page: page,
      },
      success: function (res) {
        $("tbody").html(res);
      },
    });
  });

  // Xử lý thêm bài viết
  $("#formAddPost").submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajax({
      type: "POST",
      url: "handleAddPost.php",
      data: data,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == "success")
          window.location.href = "../../dashboard.php";
      },
    });
  });

  // Xử lý sửa bài viết
  $("#formEditPost").submit(function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajax({
      type: "POST",
      url: "handleEditPost.php",
      data: data,
      success: function (res) {
        res = JSON.parse(res);
        if (res.status == "success")
          window.location.href = "../../dashboard.php";
      },
    });
  });

  // Xử lý xóa bài viết
  $("a.btnDelete").click(function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var yes = confirm("Bạn có chắc chắn muốn xóa bài viết này?");
    if (!yes) return;
    $.ajax({
      type: "POST",
      url: "handle/Post/handleDeletePost.php",
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
