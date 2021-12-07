-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 22, 2021 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ensonet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albumanh`
--

CREATE TABLE `albumanh` (
  `IDAlbumAnh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenAlbum` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albumanh`
--

INSERT INTO `albumanh` (`IDAlbumAnh`, `TenAlbum`) VALUES
('ANHBIA', 'Ảnh Bìa'),
('ANHDAIDIEN', 'Ảnh Đại Diện'),
('THONGTHUON', 'Thông thường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `IDBaiDang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDTaiKhoan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDQuyenRiengTu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GanThe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDCamXuc` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDViTri` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NgayDang` datetime NOT NULL,
  `LoaiBaiDang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`IDBaiDang`, `IDTaiKhoan`, `IDQuyenRiengTu`, `NoiDung`, `GanThe`, `IDCamXuc`, `IDViTri`, `NgayDang`, `LoaiBaiDang`) VALUES
('2000000001', '1000000001', 'CHIBANBE', 'thay đổi avatar mới', NULL, NULL, NULL, '2021-02-21 17:25:25', 0),
('2000000002', '1000000001', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-21 17:26:09', 1),
('2000000003', '1000000002', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-21 17:30:14', 0),
('2000000004', '1000000002', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-21 17:30:22', 1),
('2000000005', '1000000002', 'CHIBANBE', '🥰Bán áo này nha🤣🤣🤣🤣 <br>\r\n🥰120k 1 cái 🥰🥰🥰', NULL, NULL, NULL, '2021-02-21 17:31:48', 2),
('2000000006', '1000000002', 'CHIBANBE', 'ai ơi cuộc sống đong đầy', NULL, NULL, NULL, '2021-02-21 17:37:23', 2),
('2000000007', '1000000003', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-22 07:43:21', 0),
('2000000008', '1000000002', 'CHIBANBE', '🤚🤚🤚🤚🤚🤚🤚🤚', NULL, NULL, NULL, '2021-02-22 07:58:13', 2),
('2000000009', '1000000002', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-22 08:22:11', 1),
('2000000010', '1000000003', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-22 16:13:23', 1),
('2000000011', '1000000006', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-22 19:27:06', 1),
('2000000012', '1000000006', 'CHIBANBE', NULL, NULL, NULL, NULL, '2021-02-22 19:27:11', 0),
('2000000013', '1000000001', 'CHIBANBE', 'hi', NULL, NULL, NULL, '2021-02-22 21:02:10', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doimatkhau`
--

CREATE TABLE `doimatkhau` (
  `IDDoiMatKhau` int(10) UNSIGNED NOT NULL,
  `IDTaiKhoan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhauCu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `IDHinhAnh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDAlbumAnh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDBaiDang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DuongDan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDungIMg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`IDHinhAnh`, `IDAlbumAnh`, `IDBaiDang`, `DuongDan`, `NoiDungIMg`) VALUES
('3000000001', 'ANHDAIDIEN', '2000000001', 'img/avatarImage/100000000120000000013000000001.jpg', NULL),
('3000000002', 'ANHBIA', '2000000002', 'img/imageBia/100000000120000000023000000002.jpg', NULL),
('3000000003', 'ANHDAIDIEN', '2000000003', 'img/avatarImage/100000000220000000033000000003.jpg', NULL),
('3000000004', 'ANHBIA', '2000000004', 'img/imageBia/100000000220000000043000000004.jpg', NULL),
('3000000005', 'THONGTHUON', '2000000005', 'img/PosTT/100000000220000000053000000005.jpg', NULL),
('3000000006', 'ANHDAIDIEN', '2000000007', 'img/avatarImage/100000000320000000073000000006.jpg', NULL),
('3000000007', 'ANHBIA', '2000000009', 'img/imageBia/100000000220000000093000000007.jpg', NULL),
('3000000008', 'ANHBIA', '2000000010', 'img/imageBia/100000000320000000103000000008.jpg', NULL),
('3000000009', 'ANHBIA', '2000000011', 'img/imageBia/100000000620000000113000000009.jpg', NULL),
('3000000010', 'ANHDAIDIEN', '2000000012', 'img/avatarImage/100000000620000000123000000010.jpg', NULL),
('3000000011', 'THONGTHUON', '2000000013', 'img/PosTT/100000000120000000133000000011.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_06_110516_taikhoan', 1),
(2, '2021_02_07_002838_moiquanhe', 2),
(3, '2021_02_07_003431_moiquanhe', 3),
(4, '2021_02_07_110522_moiquanhe', 4),
(5, '2021_02_18_232704_doimatkhau', 5),
(6, '2021_02_19_071839_quyenriengtu', 6),
(7, '2021_02_19_071855_hinhanh', 6),
(8, '2021_02_19_071905_baidang', 6),
(9, '2021_02_19_072742_hinhanh', 7),
(10, '2021_02_19_072808_baidang', 8),
(11, '2021_02_19_075150_albumanh', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `moiquanhe`
--

CREATE TABLE `moiquanhe` (
  `IDMoiQuanHe` int(10) UNSIGNED NOT NULL,
  `IDTaiKhoan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDBanBe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayGui` datetime NOT NULL,
  `NgayChapNhan` datetime DEFAULT NULL,
  `TheoDoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `moiquanhe`
--

INSERT INTO `moiquanhe` (`IDMoiQuanHe`, `IDTaiKhoan`, `IDBanBe`, `TinhTrang`, `NgayGui`, `NgayChapNhan`, `TheoDoi`) VALUES
(72, '1000000002', '1000000004', 3, '2021-02-21 00:00:00', '2021-02-21 00:00:00', 0),
(73, '1000000004', '1000000002', 3, '2021-02-21 00:00:00', '2021-02-21 00:00:00', 0),
(74, '1000000003', '1000000004', 3, '2021-02-21 00:00:00', '2021-02-21 00:00:00', 0),
(75, '1000000004', '1000000003', 3, '2021-02-21 00:00:00', '2021-02-21 00:00:00', 0),
(76, '1000000001', '1000000002', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(77, '1000000002', '1000000001', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(78, '1000000001', '1000000003', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(79, '1000000003', '1000000001', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(80, '1000000002', '1000000003', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(81, '1000000003', '1000000002', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(82, '1000000005', '1000000001', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(83, '1000000001', '1000000005', 3, '2021-02-22 00:00:00', '2021-02-22 00:00:00', 0),
(92, '1000000001', '1000000006', 1, '2021-02-22 20:56:49', NULL, 0),
(93, '1000000006', '1000000001', 2, '2021-02-22 20:56:49', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyenriengtu`
--

CREATE TABLE `quyenriengtu` (
  `IDQuyenRiengTu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenQuyenRiengTu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyenriengtu`
--

INSERT INTO `quyenriengtu` (`IDQuyenRiengTu`, `TenQuyenRiengTu`) VALUES
('CHIBANBE', 'Chỉ Bạn Bè'),
('CONGKHAI', 'Công Khai'),
('RIENGTU', 'Riêng Tư');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTaiKhoan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ho` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CodeEmail` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CodeSoDienThoai` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AnhDaiDien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnhBia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `MoTa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LanDangNhap` int(11) NOT NULL,
  `LoaiTaiKhoan` int(11) NOT NULL,
  `XacMinh` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`IDTaiKhoan`, `MatKhau`, `Ho`, `Ten`, `Email`, `SoDienThoai`, `CodeEmail`, `CodeSoDienThoai`, `AnhDaiDien`, `AnhBia`, `GioiTinh`, `NgaySinh`, `MoTa`, `LanDangNhap`, `LoaiTaiKhoan`, `XacMinh`, `TinhTrang`, `NgayTao`) VALUES
('1000000001', '8f4b4f8d10b7606b8f65f50259a4b3ac', 'Trà Tấn', 'Hưởng', 'tratanhuong01@gmail.com', NULL, '327794', NULL, 'img/avatarImage/100000000120000000013000000001.jpg', 'img/imageBia/100000000120000000023000000002.jpg', 'Nam', '2001-10-01 00:00:00', '❤️Offline❤️', 0, 0, 1, 0, '2021-02-08 18:22:57'),
('1000000002', 'a7852794e35da21b302ab893da5cd601', 'Lê Văn', 'Đại Việt', 'hcj46980@eoopy.com', NULL, '934597', NULL, 'img/avatarImage/100000000220000000033000000003.jpg', 'img/imageBia/100000000220000000093000000007.jpg', 'Nam', '1990-01-01 00:00:00', NULL, 0, 0, 1, 0, '2021-02-21 17:29:37'),
('1000000003', '4024241f5ea17b115f2676e9385b61b1', 'Canh', 'Nguyen', 'ohb88519@cuoly.com', NULL, '495536', NULL, 'img/avatarImage/100000000320000000073000000006.jpg', 'img/imageBia/100000000320000000103000000008.jpg', 'Nam', '1990-01-01 00:00:00', NULL, 0, 0, 1, 0, '2021-02-21 20:24:01'),
('1000000004', 'cdad895d9430dae2a19b738663515202', 'Lão', 'Hổ', 'pwx94941@cuoly.com', NULL, '919167', NULL, 'img/boy.jpg', NULL, 'Nam', '1996-01-01 00:00:00', NULL, 0, 0, 1, 0, '2021-02-22 06:23:10'),
('1000000005', 'd958fe03109f7683ea50c396730e1791', 'Điện', 'Bàn', 'yak25310@zwoho.com', NULL, '124916', NULL, 'img/girl.jpg', NULL, 'Nữ', '1990-01-01 00:00:00', NULL, 0, 0, 1, 0, '2021-02-22 19:18:58'),
('1000000006', '6e2d86a21fbc49ccf2e9ee4fe6ef9334', 'Hiếu', 'Nguyễn', 'xbe51322@cuoly.com', NULL, '415633', NULL, 'img/avatarImage/100000000620000000123000000010.jpg', 'img/imageBia/100000000620000000113000000009.jpg', 'Nam', '2001-01-01 00:00:00', NULL, 0, 0, 1, 0, '2021-02-22 19:25:18');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `albumanh`
--
ALTER TABLE `albumanh`
  ADD PRIMARY KEY (`IDAlbumAnh`);

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`IDBaiDang`),
  ADD KEY `baidang_idtaikhoan_index` (`IDTaiKhoan`),
  ADD KEY `baidang_idquyenriengtu_index` (`IDQuyenRiengTu`),
  ADD KEY `baidang_idcamxuc_index` (`IDCamXuc`),
  ADD KEY `baidang_idvitri_index` (`IDViTri`);

--
-- Chỉ mục cho bảng `doimatkhau`
--
ALTER TABLE `doimatkhau`
  ADD PRIMARY KEY (`IDDoiMatKhau`),
  ADD KEY `doimatkhau_idtaikhoan_index` (`IDTaiKhoan`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD KEY `hinhanh_idalbumanh_foreign` (`IDAlbumAnh`),
  ADD KEY `hinhanh_idbaidang_foreign` (`IDBaiDang`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `moiquanhe`
--
ALTER TABLE `moiquanhe`
  ADD PRIMARY KEY (`IDMoiQuanHe`),
  ADD KEY `moiquanhe_idtaikhoan_index` (`IDTaiKhoan`);

--
-- Chỉ mục cho bảng `quyenriengtu`
--
ALTER TABLE `quyenriengtu`
  ADD PRIMARY KEY (`IDQuyenRiengTu`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTaiKhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `doimatkhau`
--
ALTER TABLE `doimatkhau`
  MODIFY `IDDoiMatKhau` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `moiquanhe`
--
ALTER TABLE `moiquanhe`
  MODIFY `IDMoiQuanHe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD CONSTRAINT `baidang_idquyenriengtu_foreign` FOREIGN KEY (`IDQuyenRiengTu`) REFERENCES `quyenriengtu` (`IDQuyenRiengTu`) ON DELETE CASCADE,
  ADD CONSTRAINT `baidang_idtaikhoan_foreign` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `doimatkhau`
--
ALTER TABLE `doimatkhau`
  ADD CONSTRAINT `doimatkhau_idtaikhoan_foreign` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_idalbumanh_foreign` FOREIGN KEY (`IDAlbumAnh`) REFERENCES `albumanh` (`IDAlbumAnh`) ON DELETE CASCADE,
  ADD CONSTRAINT `hinhanh_idbaidang_foreign` FOREIGN KEY (`IDBaiDang`) REFERENCES `baidang` (`IDBaiDang`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `moiquanhe`
--
ALTER TABLE `moiquanhe`
  ADD CONSTRAINT `moiquanhe_idtaikhoan_foreign` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
