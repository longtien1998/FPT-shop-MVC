-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 12, 2024 lúc 09:51 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fpt_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baivietsanpham`
--

CREATE TABLE `baivietsanpham` (
  `MaBaiViet` int(11) NOT NULL,
  `BaiVietSanPham` text,
  `MaHinhAnh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baivietsanpham`
--

INSERT INTO `baivietsanpham` (`MaBaiViet`, `BaiVietSanPham`, `MaHinhAnh`) VALUES
(1, 'hihi', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangmau`
--

CREATE TABLE `bangmau` (
  `MaMau` int(11) NOT NULL,
  `TenMau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bangmau`
--

INSERT INTO `bangmau` (`MaMau`, `TenMau`) VALUES
(1, 'Đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxuly`
--

CREATE TABLE `boxuly` (
  `MaBoXuLy` int(11) NOT NULL,
  `PhienBanCPU` varchar(255) DEFAULT NULL,
  `MaHang` int(11) DEFAULT NULL,
  `CongNgheCPU` varchar(255) DEFAULT NULL,
  `LoaiCPU` varchar(255) DEFAULT NULL,
  `SoNhan` int(11) DEFAULT NULL,
  `SoLuongLuong` int(11) DEFAULT NULL,
  `TocDoCPU` decimal(5,2) DEFAULT NULL,
  `TocDoToiDa` decimal(5,2) DEFAULT NULL,
  `BoNhoDem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `boxuly`
--

INSERT INTO `boxuly` (`MaBoXuLy`, `PhienBanCPU`, `MaHang`, `CongNgheCPU`, `LoaiCPU`, `SoNhan`, `SoLuongLuong`, `TocDoCPU`, `TocDoToiDa`, `BoNhoDem`) VALUES
(1, '', 1, 'i5', '12450H', 8, 12, '2.00', '4.40', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calamviec`
--

CREATE TABLE `calamviec` (
  `MaCa` int(11) NOT NULL,
  `ThoiGianCa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `calamviec`
--

INSERT INTO `calamviec` (`MaCa`, `ThoiGianCa`) VALUES
(1, '06h - 14h30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `camera`
--

CREATE TABLE `camera` (
  `CameraID` int(11) NOT NULL,
  `LoaiCamera` varchar(50) DEFAULT NULL,
  `Standard` varchar(50) DEFAULT NULL,
  `UltraWide` varchar(50) DEFAULT NULL,
  `Telephoto` varchar(50) DEFAULT NULL,
  `QuayPhim` varchar(50) DEFAULT NULL,
  `TinhNang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `MaDanhGia` int(11) NOT NULL,
  `MaTaiKhoan` varchar(255) DEFAULT NULL,
  `MaHinhAnh` int(11) DEFAULT NULL,
  `SoSao` int(11) DEFAULT NULL,
  `NgayDanhGia` date DEFAULT NULL,
  `NoiDungDanhGia` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDanhMuc` int(11) NOT NULL,
  `patent_danhmuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL,
  `displayhome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDanhMuc`, `patent_danhmuc`, `TenDanhMuc`, `displayhome`) VALUES
(1, 0, 'LAPTOP', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `MaDiaChi` int(11) NOT NULL,
  `TinhThanhPho` varchar(50) DEFAULT NULL,
  `QuanHuyen` varchar(50) DEFAULT NULL,
  `PhuongXa` varchar(50) DEFAULT NULL,
  `SoNhaDuong` varchar(100) DEFAULT NULL,
  `LoaiDiaChi` varchar(50) DEFAULT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dohoa`
--

CREATE TABLE `dohoa` (
  `MaDoHoa` int(11) NOT NULL,
  `LoaiDoHoa` varchar(50) DEFAULT NULL,
  `MaHang` int(11) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `BoNho` int(11) DEFAULT NULL,
  `MaThongSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dohoa`
--

INSERT INTO `dohoa` (`MaDoHoa`, `LoaiDoHoa`, `MaHang`, `Model`, `BoNho`, `MaThongSo`) VALUES
(1, 'Card onboard', 1, 'Iris Xe', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `maDonViVanChuyen` int(11) NOT NULL,
  `tenDonViVanChuyen` varchar(255) DEFAULT NULL,
  `PhiVanChuyen` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgia`
--

CREATE TABLE `giamgia` (
  `MaGiamGia` int(11) NOT NULL,
  `GiaTriGiamGia` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanpham`
--

CREATE TABLE `hangsanpham` (
  `MaHang` int(11) NOT NULL,
  `TenHang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hangsanpham`
--

INSERT INTO `hangsanpham` (`MaHang`, `TenHang`) VALUES
(1, 'APPLE'),
(2, 'HP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hedieuhanh`
--

CREATE TABLE `hedieuhanh` (
  `HeDieuHanhID` int(11) NOT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `Version` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MaHinhAnh` int(11) NOT NULL,
  `ALT` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`MaHinhAnh`, `ALT`, `URL`, `MaSanPham`) VALUES
(1, 'Hình ảnh', '1.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayThanhToan` date DEFAULT NULL,
  `TongThanhToan` decimal(15,2) DEFAULT NULL,
  `TrangThaiHoaDon` varchar(50) DEFAULT NULL,
  `MaPhuongThuc` int(11) DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `MaThanhToan` int(11) DEFAULT NULL,
  `maVanChuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `ID` int(11) NOT NULL,
  `MaHoaDon` int(11) DEFAULT NULL,
  `MaSanPham` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `MaGiamGia` int(11) DEFAULT NULL,
  `ThanhTien` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoidapsanpham`
--

CREATE TABLE `hoidapsanpham` (
  `MaHoiDap` int(11) NOT NULL,
  `MaTaiKhoan` varchar(255) DEFAULT NULL,
  `MaHinhAnh` int(11) DEFAULT NULL,
  `NgayGui` date DEFAULT NULL,
  `NoiDungHoiDap` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `DiemThuong` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `DiemThuong`, `email`) VALUES
(1, 300, 'my@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `MaLienHe` int(11) NOT NULL,
  `MaTaiKhoan` varchar(255) DEFAULT NULL,
  `NoiDungGopY` text,
  `NgayGopY` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luutru`
--

CREATE TABLE `luutru` (
  `MaLuuTru` int(11) NOT NULL,
  `KieuOCung` varchar(50) DEFAULT NULL,
  `LoaiOCung` varchar(50) DEFAULT NULL,
  `DungLuong` int(11) DEFAULT NULL,
  `BoNhoTrong` int(11) DEFAULT NULL,
  `BoNhoConLai` int(11) DEFAULT NULL,
  `DanhBaLuuTru` varchar(50) DEFAULT NULL,
  `TheNhoNgoai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `luutru`
--

INSERT INTO `luutru` (`MaLuuTru`, `KieuOCung`, `LoaiOCung`, `DungLuong`, `BoNhoTrong`, `BoNhoConLai`, `DanhBaLuuTru`, `TheNhoNgoai`) VALUES
(1, 'SSD', '	M2.PCIe', 512, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manhinh`
--

CREATE TABLE `manhinh` (
  `MaManHinh` int(11) NOT NULL,
  `KichThuocManHinh` decimal(5,2) DEFAULT NULL,
  `CongNgheManHinh` varchar(255) DEFAULT NULL,
  `DoPhanGiai` varchar(20) DEFAULT NULL,
  `LoaiManHinh` varchar(50) DEFAULT NULL,
  `TanSoQuet` int(11) DEFAULT NULL,
  `TamNen` varchar(50) DEFAULT NULL,
  `DoSangToiDa` int(11) DEFAULT NULL,
  `DoPhuMau` varchar(50) DEFAULT NULL,
  `TyLeManHinh` varchar(20) DEFAULT NULL,
  `LoaiCamUng` varchar(50) DEFAULT NULL,
  `ChuẩnManHinh` varchar(50) DEFAULT NULL,
  `ChatLieuMatKinh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manhinh`
--

INSERT INTO `manhinh` (`MaManHinh`, `KichThuocManHinh`, `CongNgheManHinh`, `DoPhanGiai`, `LoaiManHinh`, `TanSoQuet`, `TamNen`, `DoSangToiDa`, `DoPhuMau`, `TyLeManHinh`, `LoaiCamUng`, `ChuẩnManHinh`, `ChatLieuMatKinh`) VALUES
(1, '15.60', 'Anti-Glare', '1920 x 1080', 'LED', 144, 'IPS', 1000, '45', '16:09', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `CCCD` varchar(20) DEFAULT NULL,
  `ChucVu` varchar(50) DEFAULT NULL,
  `MaCa` int(11) DEFAULT NULL,
  `HinhAnh` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MaRols` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `CCCD`, `ChucVu`, `MaCa`, `HinhAnh`, `Email`, `MaRols`) VALUES
(1, NULL, NULL, 1, NULL, 'tonlongtien1998@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucnhanhang`
--

CREATE TABLE `phuongthucnhanhang` (
  `MaPhuongThuc` int(11) NOT NULL,
  `MaDiaChi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ram`
--

CREATE TABLE `ram` (
  `MaRAM` int(11) NOT NULL,
  `DungLuongRAM` int(11) DEFAULT NULL,
  `LoaiRAM` varchar(50) DEFAULT NULL,
  `TocDoRAM` int(11) DEFAULT NULL,
  `SoKheCamRoi` int(11) DEFAULT NULL,
  `SoKheRAMConLai` int(11) DEFAULT NULL,
  `SoRAMOnboard` int(11) DEFAULT NULL,
  `HoTroRAMToiDa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ram`
--

INSERT INTO `ram` (`MaRAM`, `DungLuongRAM`, `LoaiRAM`, `TocDoRAM`, `SoKheCamRoi`, `SoKheRAMConLai`, `SoRAMOnboard`, `HoTroRAMToiDa`) VALUES
(1, 8, 'DDR4', 3200, 2, 1, 0, 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rols`
--

CREATE TABLE `rols` (
  `MaRols` int(11) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `ChucNang2` int(1) NOT NULL DEFAULT '0',
  `ChucNang3` int(1) NOT NULL DEFAULT '0',
  `ChucNang4` int(1) NOT NULL DEFAULT '0',
  `ChucNang5` int(1) NOT NULL DEFAULT '0',
  `ChucNang6` int(1) NOT NULL DEFAULT '0',
  `ChucNang7` int(1) NOT NULL DEFAULT '0',
  `ChucNang8` int(1) NOT NULL DEFAULT '0',
  `ChucNang9` int(1) NOT NULL DEFAULT '0',
  `ChucNang10` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `rols`
--

INSERT INTO `rols` (`MaRols`, `admin`, `ChucNang2`, `ChucNang3`, `ChucNang4`, `ChucNang5`, `ChucNang6`, `ChucNang7`, `ChucNang8`, `ChucNang9`, `ChucNang10`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) DEFAULT NULL,
  `MaHang` int(11) DEFAULT NULL,
  `MaDanhMuc` int(11) DEFAULT NULL,
  `MaBaiViet` int(11) DEFAULT NULL,
  `MaSKU` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `MaHang`, `MaDanhMuc`, `MaBaiViet`, `MaSKU`) VALUES
(1, 'Laptop Dell', 1, 1, 1, 1),
(2, 'LapTop HP', 2, 1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamchitiet`
--

CREATE TABLE `sanphamchitiet` (
  `MaSKU` int(11) NOT NULL,
  `SoLuongTrongKho` int(11) DEFAULT NULL,
  `GiaTien` int(20) DEFAULT NULL,
  `MaMau` int(11) DEFAULT NULL,
  `GiamGia` int(11) DEFAULT NULL,
  `DungLuong` varchar(50) DEFAULT NULL,
  `MaThongSo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanphamchitiet`
--

INSERT INTO `sanphamchitiet` (`MaSKU`, `SoLuongTrongKho`, `GiaTien`, `MaMau`, `GiamGia`, `DungLuong`, `MaThongSo`) VALUES
(1, 100, 12000000, 1, 1, '1', 1),
(2, 99, 15000000, 1, 0, '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `email` varchar(255) NOT NULL,
  `matKhau` varchar(255) DEFAULT NULL,
  `soDienThoai` varchar(20) DEFAULT NULL,
  `gioiTinh` varchar(10) DEFAULT NULL,
  `ngaySinh` date DEFAULT NULL,
  `ho` varchar(50) DEFAULT NULL,
  `tenLot` varchar(50) DEFAULT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `roles` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`email`, `matKhau`, `soDienThoai`, `gioiTinh`, `ngaySinh`, `ho`, `tenLot`, `ten`, `roles`) VALUES
('my@gmail.com', '202cb962ac59075b964b07152d234b70', '0982268784', 'nu', '2002-05-24', 'Tôn', 'Ngọc', 'Mỹ', 0),
('nguyen.ndt6868@gmail.com', '4297f44b13955235245b2497399d7a93', '0787559037', 'nam', '2004-07-25', 'Nguyễn', 'Thanh', 'Nguyên', 0),
('tientlpd07578@fpt.edu.vn', '202cb962ac59075b964b07152d234b70', '0328916794', 'nu', '1998-10-07', 'Tôn', 'Long', 'Tiến', 0),
('tonlongtien1998@gmail.com', '202cb962ac59075b964b07152d234b70', '0982268784', 'nam', '1998-10-07', 'Tôn', 'Long', 'Tiến', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `MaThanhToan` int(11) NOT NULL,
  `PhuongThucThanhToan` varchar(50) DEFAULT NULL,
  `TrangThaiThanhToan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsosanpham`
--

CREATE TABLE `thongsosanpham` (
  `MaThongSo` int(11) NOT NULL,
  `MaHang` int(11) DEFAULT NULL,
  `XuatXu` varchar(255) DEFAULT NULL,
  `ThoiDiemRaMat` varchar(10) DEFAULT NULL,
  `ThoiGianBaoHanh` int(11) DEFAULT NULL,
  `HuongDanBaoQuan` text,
  `KichThuoc` varchar(50) DEFAULT NULL,
  `TrongLuong` decimal(10,2) DEFAULT NULL,
  `BangLe` varchar(255) DEFAULT NULL,
  `TanNhiet` varchar(255) DEFAULT NULL,
  `ChatLieu` varchar(255) DEFAULT NULL,
  `KhaNangChongNuocBui` varchar(50) DEFAULT NULL,
  `MaBoXuLy` int(11) DEFAULT NULL,
  `MaRAM` int(11) DEFAULT NULL,
  `MaManHinh` int(11) DEFAULT NULL,
  `MaDoHoa` int(11) DEFAULT NULL,
  `MaLuuTru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongsosanpham`
--

INSERT INTO `thongsosanpham` (`MaThongSo`, `MaHang`, `XuatXu`, `ThoiDiemRaMat`, `ThoiGianBaoHanh`, `HuongDanBaoQuan`, `KichThuoc`, `TrongLuong`, `BangLe`, `TanNhiet`, `ChatLieu`, `KhaNangChongNuocBui`, `MaBoXuLy`, `MaRAM`, `MaManHinh`, `MaDoHoa`, `MaLuuTru`) VALUES
(1, 1, 'Việt Nam', 'T3/2024', 24, 'Để nơi khô ráo, nhẹ tay, dễ vỡ.', '360(W) x 238(D) x 2.27(H)', '1.90', 'Bản lề mở 135 độ', '2 quạt', 'Vỏ máy: Nhựa', '', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `maVanChuyen` int(11) NOT NULL,
  `maNhanVien` int(11) DEFAULT NULL,
  `TrangThaiShip` varchar(50) DEFAULT NULL,
  `maDonViVanChuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baivietsanpham`
--
ALTER TABLE `baivietsanpham`
  ADD PRIMARY KEY (`MaBaiViet`),
  ADD KEY `MaHinhAnh` (`MaHinhAnh`);

--
-- Chỉ mục cho bảng `bangmau`
--
ALTER TABLE `bangmau`
  ADD PRIMARY KEY (`MaMau`);

--
-- Chỉ mục cho bảng `boxuly`
--
ALTER TABLE `boxuly`
  ADD PRIMARY KEY (`MaBoXuLy`);

--
-- Chỉ mục cho bảng `calamviec`
--
ALTER TABLE `calamviec`
  ADD PRIMARY KEY (`MaCa`);

--
-- Chỉ mục cho bảng `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`CameraID`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`),
  ADD KEY `MaHinhAnh` (`MaHinhAnh`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`MaDiaChi`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `dohoa`
--
ALTER TABLE `dohoa`
  ADD PRIMARY KEY (`MaDoHoa`);

--
-- Chỉ mục cho bảng `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  ADD PRIMARY KEY (`maDonViVanChuyen`);

--
-- Chỉ mục cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MaGiamGia`);

--
-- Chỉ mục cho bảng `hangsanpham`
--
ALTER TABLE `hangsanpham`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `hedieuhanh`
--
ALTER TABLE `hedieuhanh`
  ADD PRIMARY KEY (`HeDieuHanhID`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`MaHinhAnh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaPhuongThuc` (`MaPhuongThuc`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaThanhToan` (`MaThanhToan`),
  ADD KEY `maVanChuyen` (`maVanChuyen`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaGiamGia` (`MaGiamGia`);

--
-- Chỉ mục cho bảng `hoidapsanpham`
--
ALTER TABLE `hoidapsanpham`
  ADD PRIMARY KEY (`MaHoiDap`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`),
  ADD KEY `MaHinhAnh` (`MaHinhAnh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MaLienHe`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `luutru`
--
ALTER TABLE `luutru`
  ADD PRIMARY KEY (`MaLuuTru`);

--
-- Chỉ mục cho bảng `manhinh`
--
ALTER TABLE `manhinh`
  ADD PRIMARY KEY (`MaManHinh`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `MaCa` (`MaCa`),
  ADD KEY `MaRols` (`MaRols`);

--
-- Chỉ mục cho bảng `phuongthucnhanhang`
--
ALTER TABLE `phuongthucnhanhang`
  ADD PRIMARY KEY (`MaPhuongThuc`),
  ADD KEY `MaDiaChi` (`MaDiaChi`);

--
-- Chỉ mục cho bảng `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`MaRAM`);

--
-- Chỉ mục cho bảng `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`MaRols`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD UNIQUE KEY `MaSKU` (`MaSKU`),
  ADD KEY `MaHang` (`MaHang`),
  ADD KEY `MaBaiViet` (`MaBaiViet`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD PRIMARY KEY (`MaSKU`),
  ADD KEY `MaMau` (`MaMau`),
  ADD KEY `MaThongSo` (`MaThongSo`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaThanhToan`);

--
-- Chỉ mục cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD PRIMARY KEY (`MaThongSo`),
  ADD KEY `MaHang` (`MaHang`),
  ADD KEY `MaBoXuLy` (`MaBoXuLy`),
  ADD KEY `MaRAM` (`MaRAM`),
  ADD KEY `MaManHinh` (`MaManHinh`),
  ADD KEY `MaDoHoa` (`MaDoHoa`),
  ADD KEY `MaLuuTru` (`MaLuuTru`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`maVanChuyen`),
  ADD KEY `maNhanVien` (`maNhanVien`),
  ADD KEY `maDonViVanChuyen` (`maDonViVanChuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `camera`
--
ALTER TABLE `camera`
  MODIFY `CameraID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hedieuhanh`
--
ALTER TABLE `hedieuhanh`
  MODIFY `HeDieuHanhID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoidapsanpham`
--
ALTER TABLE `hoidapsanpham`
  MODIFY `MaHoiDap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `MaLienHe` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baivietsanpham`
--
ALTER TABLE `baivietsanpham`
  ADD CONSTRAINT `baivietsanpham_ibfk_1` FOREIGN KEY (`MaHinhAnh`) REFERENCES `hinhanh` (`MaHinhAnh`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `danhgiasanpham_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`email`),
  ADD CONSTRAINT `danhgiasanpham_ibfk_2` FOREIGN KEY (`MaHinhAnh`) REFERENCES `hinhanh` (`MaHinhAnh`);

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaPhuongThuc`) REFERENCES `phuongthucnhanhang` (`MaPhuongThuc`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MaThanhToan`) REFERENCES `thanhtoan` (`MaThanhToan`),
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`maVanChuyen`) REFERENCES `vanchuyen` (`maVanChuyen`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_3` FOREIGN KEY (`MaGiamGia`) REFERENCES `giamgia` (`MaGiamGia`);

--
-- Các ràng buộc cho bảng `hoidapsanpham`
--
ALTER TABLE `hoidapsanpham`
  ADD CONSTRAINT `hoidapsanpham_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`email`),
  ADD CONSTRAINT `hoidapsanpham_ibfk_2` FOREIGN KEY (`MaHinhAnh`) REFERENCES `hinhanh` (`MaHinhAnh`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_2` FOREIGN KEY (`email`) REFERENCES `taikhoan` (`email`);

--
-- Các ràng buộc cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`email`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaCa`) REFERENCES `calamviec` (`MaCa`),
  ADD CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`Email`) REFERENCES `taikhoan` (`email`),
  ADD CONSTRAINT `nhanvien_ibfk_4` FOREIGN KEY (`MaRols`) REFERENCES `rols` (`MaRols`);

--
-- Các ràng buộc cho bảng `phuongthucnhanhang`
--
ALTER TABLE `phuongthucnhanhang`
  ADD CONSTRAINT `phuongthucnhanhang_ibfk_1` FOREIGN KEY (`MaDiaChi`) REFERENCES `diachi` (`MaDiaChi`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaHang`) REFERENCES `hangsanpham` (`MaHang`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaBaiViet`) REFERENCES `baivietsanpham` (`MaBaiViet`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmucsanpham` (`MaDanhMuc`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`MaSKU`) REFERENCES `sanphamchitiet` (`MaSKU`);

--
-- Các ràng buộc cho bảng `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD CONSTRAINT `sanphamchitiet_ibfk_1` FOREIGN KEY (`MaMau`) REFERENCES `bangmau` (`MaMau`),
  ADD CONSTRAINT `sanphamchitiet_ibfk_2` FOREIGN KEY (`MaThongSo`) REFERENCES `thongsosanpham` (`MaThongSo`);

--
-- Các ràng buộc cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD CONSTRAINT `thongsosanpham_ibfk_1` FOREIGN KEY (`MaHang`) REFERENCES `hangsanpham` (`MaHang`),
  ADD CONSTRAINT `thongsosanpham_ibfk_2` FOREIGN KEY (`MaBoXuLy`) REFERENCES `boxuly` (`MaBoXuLy`),
  ADD CONSTRAINT `thongsosanpham_ibfk_3` FOREIGN KEY (`MaRAM`) REFERENCES `ram` (`MaRAM`),
  ADD CONSTRAINT `thongsosanpham_ibfk_4` FOREIGN KEY (`MaManHinh`) REFERENCES `manhinh` (`MaManHinh`),
  ADD CONSTRAINT `thongsosanpham_ibfk_5` FOREIGN KEY (`MaDoHoa`) REFERENCES `dohoa` (`MaDoHoa`),
  ADD CONSTRAINT `thongsosanpham_ibfk_6` FOREIGN KEY (`MaLuuTru`) REFERENCES `luutru` (`MaLuuTru`);

--
-- Các ràng buộc cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD CONSTRAINT `vanchuyen_ibfk_1` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `vanchuyen_ibfk_2` FOREIGN KEY (`maDonViVanChuyen`) REFERENCES `donvivanchuyen` (`maDonViVanChuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
