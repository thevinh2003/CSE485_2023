$(document).ready(function () {
    // Xử lý phân trang
    $(".btnPageNum").click(function (e) {
      e.preventDefault();
      let page = $(this).text();
      $(".btnPageNum").removeClass("active");
      $(this).addClass("active");
      $.ajax({
        url: "../admin/handle/Category/getTableCategory.php",
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
    $("#formAddCategory").submit(function (e) {
      e.preventDefault();
      var data = $(this).serializeArray();
      $.ajax({
        type: "POST",
        url: "handleAddCategory.php",
        data: data,
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == "success")
            window.location.href = "../../dashboard.php";
        },
      });
    });
  
    // Xử lý sửa bài viết
    $("#formEditCategory").submit(function (e) {
      e.preventDefault();
      var data = $(this).serializeArray();
      $.ajax({
        type: "POST",
        url: "handleEditCategory.php",
        data: data,
        success: function (res) {
          res = JSON.parse(res);
          if (res.status == "success")
            window.location.href = "../../dashboard.php";
        },
      });
    });
  
    // Xử lý xóa bài viết
    $("tbody").on("click", ".btnDelete", function (e) {
      e.preventDefault();
      var id = $(this).attr("data-id");
      var yes = confirm("Bạn có chắc chắn muốn xóa thể loại này?");
      if (!yes) return;
      $.ajax({
        type: "POST",
        url: "handle/Category/handleDeleteCategory.php",
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