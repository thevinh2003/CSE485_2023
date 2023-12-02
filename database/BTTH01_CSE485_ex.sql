USE btth01_cse485
SELECT * FROM tacgia
SELECT * FROM theloai
SELECT * FROM baiviet

-- a.Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình
SELECT * FROM baiviet JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE ten_tloai = "Nhạc trữ tình"

-- b.Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT * FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE ten_tgia = "Nhacvietplus"

-- c.Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT theloai.* FROM theloai LEFT JOIN baiviet ON theloai.ma_tloai = baiviet.ma_tloai WHERE baiviet.ma_bviet IS null

-- d.Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên
-- thể loại, ngày viết
SELECT ma_bviet AS "Mã bài viết",
		 tieude AS "Tên bài viết",
		 ten_bhat AS "Tên bài hát",
		 tacgia.ten_tgia AS "Tên tác giả",
		 theloai.ten_tloai AS "Tên thể loại", 
		 ngayviet AS "Ngày viết" FROM baiviet 
JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai

-- e.Tìm thể loại có số bài viết nhiều nhất
SELECT theloai.ma_tloai,theloai.ten_tloai,COUNT(baiviet.ma_tloai) AS "Số lượng bài viết" FROM baiviet 
JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai GROUP BY theloai.ma_tloai,theloai.ten_tloai 
HAVING COUNT(baiviet.ma_tloai) >= ALL(SELECT COUNT(ma_bviet) FROM baiviet GROUP BY ma_tloai )

-- f.Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_tgia) AS "Số bài viết" FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia GROUP BY tacgia.ten_tgia ORDER BY COUNT(baiviet.ma_tgia) DESC LIMIT 2;

-- g.Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em” 
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';

-- h.Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”, “em”
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%' OR
									 tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%';

-- i.Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên thể loại và tên tác giả
CREATE VIEW vw_Music AS 
	SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia FROM baiviet JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai JOIN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia;
select * from vw_Music;

-- j.Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách
-- Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi.
DELIMITER ;
CREATE PROCEDURE sp_DSBaiViet (IN tentheloai VARCHAR(50))
BEGIN
    DECLARE matheloai INT;
    SELECT ma_tloai INTO matheloai FROM theloai WHERE ten_tloai = tentheloai;
    
    IF matheloai IS NULL THEN
        SELECT 'Thể loại không tồn tại' AS 'Lỗi';
    ELSE
        SELECT * FROM baiviet WHERE ma_tloai = matheloai;
    END IF;
END //
DELIMITER ;

CALL sp_DSBaiViet('Nhạc trữ tình');

-- k.Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để
-- khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo.
ALTER TABLE theloai ADD SLBaiViet INT 
DELIMITER ;
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet FOR EACH ROW 
BEGIN
    UPDATE theloai SET SLBaiViet = SLBaiViet + 1 WHERE ma_tloai = NEW.ma_tloai;
END //
DELIMITER ;

-- l.Bổ sung thêm bảng Users để lưu thông tin Tài khoản đăng nhập và sử dụng cho chức năng Đăng nhập/Quản trị trang web.
CREATE TABLE Users
(
	username VARCHAR(30) NOT NULL UNIQUE,
	pass VARCHAR(255) NOT NULL,
	role enum('Admin', 'User') not null
);
insert into users values ('AT' ,'123' , 'Admin');