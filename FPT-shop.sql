create database FPT_shop;

-- Tạo bảng Tài khoản
CREATE TABLE TaiKhoan (
    email VARCHAR(255) PRIMARY KEY,
    matKhau VARCHAR(255),
    soDienThoai VARCHAR(20),
    gioiTinh VARCHAR(10),
    ngaySinh DATE,
    ho VARCHAR(50),
    tenLot VARCHAR(50),
    ten VARCHAR(50)
);
-- Tạo bảng Khách hàng
CREATE TABLE KhachHang (
    MaKhachHang INT PRIMARY KEY,
    DiemThuong INT,
    MaDiaChi INT,
    Email VARCHAR(255) UNIQUE,
    FOREIGN KEY (MaDiaChi) REFERENCES DiaChi(MaDiaChi),
    FOREIGN KEY (Email) REFERENCES TaiKhoan(Email)
);

-- Tạo bảng Nhân viên
CREATE TABLE NhanVien (
    MaNhanVien INT PRIMARY KEY,
    CCCD VARCHAR(20),
    ChucVu VARCHAR(50),
    MaCa INT,
    MaHinhAnh INT,
    Email VARCHAR(255) UNIQUE,
    MaRols INT,
    MaDiaChi INT,
    FOREIGN KEY (MaCa) REFERENCES CaLamViec(MaCa),
    FOREIGN KEY (MaHinhAnh) REFERENCES HinhAnh(MaHinhAnh),
    FOREIGN KEY (Email) REFERENCES TaiKhoan(Email),
    FOREIGN KEY (MaRols) REFERENCES Rols(MaRols),
    FOREIGN KEY (MaDiaChi) REFERENCES DiaChi(MaDiaChi)
);

-- Tạo bảng Ca làm việc
CREATE TABLE CaLamViec (
    MaCa INT PRIMARY KEY,
    ThoiGianCa VARCHAR(50)
);

-- Tạo bảng Rols
CREATE TABLE Rols (
    MaRols INT PRIMARY KEY,
    ChucNang1 VARCHAR(255),
    ChucNang2 VARCHAR(255),
    ChucNang3 VARCHAR(255),
    ChucNang4 VARCHAR(255),
    ChucNang5 VARCHAR(255),
    ChucNang6 VARCHAR(255),
    ChucNang7 VARCHAR(255),
    ChucNang8 VARCHAR(255),
    ChucNang9 VARCHAR(255),
    ChucNang10 VARCHAR(255)
);

-- Tạo bảng Địa chỉ
CREATE TABLE DiaChi (
    MaDiaChi INT PRIMARY KEY,
    TinhThanhPho VARCHAR(50),
    QuanHuyen VARCHAR(50),
    PhuongXa VARCHAR(50),
    SoNhaDuong VARCHAR(100),
    LoaiDiaChi VARCHAR(50)
);

-- Tạo bản hóa đơn
CREATE TABLE HoaDon (
    MaHoaDon INT PRIMARY KEY,
    NgayThanhToan DATE,
    TongThanhToan DECIMAL(15, 2),
    TrangThaiHoaDon VARCHAR(50),
    MaPhuongThuc INT,
    MaKhachHang INT,
    MaThanhToan INT,
    maVanChuyen INT,
    FOREIGN KEY (MaPhuongThuc) REFERENCES PhuongThucNhanHang(MaPhuongThuc),
    FOREIGN KEY (MaKhachHang) REFERENCES KhachHang(MaKhachHang),
    FOREIGN KEY (MaThanhToan) REFERENCES ThanhToan(MaThanhToan),
    FOREIGN KEY (maVanChuyen) REFERENCES vanChuyen(maVanChuyen)
);

-- Tạo bảng Vận chuyển
CREATE TABLE vanChuyen (
	maVanChuyen INT PRIMARY KEY,
    maNhanVien INT,
    TrangThaiShip VARCHAR(50),
    maDonViVanChuyen INT,
    FOREIGN KEY (maNhanVien) REFERENCES nhanVien(maNhanVien),
    FOREIGN KEY (maDonViVanChuyen) REFERENCES donViVanChuyen(maDonViVanChuyen)
);

-- Tạo bảng VanChuyen
CREATE TABLE donViVanChuyen (
    maDonViVanChuyen INT PRIMARY KEY,
    tenDonViVanChuyen VARCHAR(255),
    PhiVanChuyen DECIMAL(15, 2)
);

-- Tạo bảng Hóa đơn chi tiết
CREATE TABLE HoaDonChiTiet (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    MaHoaDon INT,
    MaSanPham INT,
    SoLuong INT,
    MaGiamGia INT,
    ThanhTien DECIMAL(15, 2),
    FOREIGN KEY (MaHoaDon) REFERENCES HoaDon(MaHoaDon),
    FOREIGN KEY (MaSanPham) REFERENCES SanPham(MaSanPham),
    FOREIGN KEY (MaGiamGia) REFERENCES GiamGia(MaGiamGia)
);


-- Tạo bảng GiamGia
CREATE TABLE GiamGia (
    MaGiamGia INT PRIMARY KEY,
    GiaTriGiamGia DECIMAL(5, 2)
);

-- Tạo bảng PhuongThucNhanHang
CREATE TABLE PhuongThucNhanHang (
    MaPhuongThuc INT PRIMARY KEY,
    MaDiaChi INT,
    FOREIGN KEY (MaDiaChi) REFERENCES DiaChi(MaDiaChi)
);

-- Tạo bảng ThanhToan
CREATE TABLE ThanhToan (
    MaThanhToan INT PRIMARY KEY,
    PhuongThucThanhToan VARCHAR(50),
    TrangThaiThanhToan VARCHAR(50)
);

-- Tạo bảng SanPham
CREATE TABLE SanPham (
    MaSanPham INT  PRIMARY KEY,
    TenSanPham VARCHAR(255),
    MaHang INT,
    MaDanhMuc INT,
    MaBaiViet INT,
	MaSKU INT UNIQUE,
    FOREIGN KEY (MaHang) REFERENCES HangSanPham(MaHang),
    FOREIGN KEY (MaBaiViet) REFERENCES Baivietsanpham(MaBaiViet),
    FOREIGN KEY (MaDanhMuc) REFERENCES DanhMucSanPham(MaDanhMuc),
    FOREIGN KEY (MaSKU) REFERENCES SanPhamChiTiet(MaSKU)
);

-- Tạo bảng ThongTinSanPham
CREATE TABLE BaiVietSanPham (
    MaBaiViet INT PRIMARY KEY,
    BaiVietSanPham TEXT,
    MaHinhAnh INT,
    FOREIGN KEY (MaHinhAnh) REFERENCES HinhAnh(MaHinhAnh)
);

-- Tạo bảng HinhAnh
CREATE TABLE HinhAnh (
    MaHinhAnh INT PRIMARY KEY,
    ALT VARCHAR(255),
    URL VARCHAR(255)
);

-- Tạo bảng SanPhamChiTiet
CREATE TABLE SanPhamChiTiet (
    MaSKU INT PRIMARY KEY,
    SoLuongTrongKho INT,
    GiaTien DECIMAL(15, 2),
    MaMau INT,
    DungLuong VARCHAR(50),
    MaThongSo INT,
    FOREIGN KEY (MaMau) REFERENCES BangMau(MaMau),
    FOREIGN KEY (MaThongSo) REFERENCES ThongSoSanPham(MaThongSo)
);

-- Tạo bảng ThongSoSanPham
CREATE TABLE ThongSoSanPham (
    MaThongSo INT PRIMARY KEY,
    MaHang INT,
    XuatXu VARCHAR(255),
    ThoiDiemRaMat DATE,
    ThoiGianBaoHanh INT,
    HuongDanBaoQuan TEXT,
    KichThuoc VARCHAR(50),
    TrongLuong DECIMAL(10, 2),
    BangLe VARCHAR(255),
    TanNhiet VARCHAR(255),
    ChatLieu VARCHAR(255),
    KhaNangChongNuocBui VARCHAR(50),
    MaBoXuLy INT,
    MaRAM INT,
    MaManHinh INT,
    MaDoHoa INT,
    MaLuuTru INT,
    FOREIGN KEY (MaHang) REFERENCES HangSanPham(MaHang),
    FOREIGN KEY (MaBoXuLy) REFERENCES BoXuLy(MaBoXuLy),
    FOREIGN KEY (MaRAM) REFERENCES RAM(MaRAM),
    FOREIGN KEY (MaManHinh) REFERENCES ManHinh(MaManHinh),
    FOREIGN KEY (MaDoHoa) REFERENCES DoHoa(MaDoHoa),
    FOREIGN KEY (MaLuuTru) REFERENCES LuuTru(MaLuuTru)
);

-- Tạo bảng BoXuLy
CREATE TABLE BoXuLy (
    MaBoXuLy INT PRIMARY KEY,
    PhienBanCPU VARCHAR(255),
    MaHang INT,
    CongNgheCPU VARCHAR(255),
    LoaiCPU VARCHAR(255),
    SoNhan INT,
    SoLuongLuong INT,
    TocDoCPU DECIMAL(5, 2),
    TocDoToiDa DECIMAL(5, 2),
    BoNhoDem INT
);

-- Tạo bảng RAM
CREATE TABLE RAM (
    MaRAM INT PRIMARY KEY,
    DungLuongRAM INT,
    LoaiRAM VARCHAR(50),
    TocDoRAM INT,
    SoKheCamRoi INT,
    SoKheRAMConLai INT,
    SoRAMOnboard INT,
    HoTroRAMToiDa INT
);

-- Tạo bảng ManHinh
CREATE TABLE ManHinh (
    MaManHinh INT PRIMARY KEY,
    KichThuocManHinh DECIMAL(5, 2),
    CongNgheManHinh VARCHAR(255),
    DoPhanGiai VARCHAR(20),
    LoaiManHinh VARCHAR(50),
    TanSoQuet INT,
    TamNen VARCHAR(50),
    DoSangToiDa INT,
    DoPhuMau VARCHAR(50),
    TyLeManHinh VARCHAR(20),
    LoaiCamUng VARCHAR(50),
    ChuẩnManHinh VARCHAR(50),
    ChatLieuMatKinh VARCHAR(50)
);


-- Tạo bảng DoHoa
CREATE TABLE DoHoa (
    MaDoHoa INT PRIMARY KEY,
    LoaiDoHoa VARCHAR(50),
    MaHang INT,
    Model VARCHAR(50),
    BoNho INT
);


-- Tạo bảng LuuTru
CREATE TABLE LuuTru (
    MaLuuTru INT PRIMARY KEY,
    KieuOCung VARCHAR(50),
    LoaiOCung VARCHAR(50),
    DungLuong INT,
    BoNhoTrong INT,
    BoNhoConLai INT,
    DanhBaLuuTru VARCHAR(50),
    TheNhoNgoai INT
);

-- Tạo bảng BangMau
CREATE TABLE BangMau (
    MaMau INT PRIMARY KEY,
    TenMau VARCHAR(50)
);

-- Tạo bảng DanhMucSanPham
CREATE TABLE DanhMucSanPham (
    MaDanhMuc INT PRIMARY KEY,
    TenDanhMuc VARCHAR(255)
);

-- Tạo bảng HangSanPham
CREATE TABLE HangSanPham (
    MaHang INT PRIMARY KEY,
    TenHang VARCHAR(255)
);

-- Tạo bảng Camera
CREATE TABLE Camera (
    CameraID INT PRIMARY KEY AUTO_INCREMENT,
    LoaiCamera VARCHAR(50),
    Standard VARCHAR(50),
    UltraWide VARCHAR(50),
    Telephoto VARCHAR(50),
    QuayPhim VARCHAR(50),
    TinhNang VARCHAR(255)
);

-- Tạo bảng HeDieuHanh
CREATE TABLE HeDieuHanh (
    HeDieuHanhID INT PRIMARY KEY AUTO_INCREMENT,
    OS VARCHAR(50),
    Version VARCHAR(50),
    Type VARCHAR(50)
);

-- Tạo bảng DanhGiaSanPham
CREATE TABLE DanhGiaSanPham (
    MaDanhGia INT PRIMARY KEY AUTO_INCREMENT,
    MaTaiKhoan VARCHAR(255),
    MaHinhAnh INT,
    SoSao INT,
    NgayDanhGia DATE,
    NoiDungDanhGia TEXT,
    FOREIGN KEY (MaTaiKhoan) REFERENCES TaiKhoan(Email),
    FOREIGN KEY (MaHinhAnh) REFERENCES HinhAnh(MaHinhAnh)
);

-- Tạo bảng HoiDapSanPham
CREATE TABLE HoiDapSanPham (
    MaHoiDap INT PRIMARY KEY AUTO_INCREMENT,
    MaTaiKhoan VARCHAR(255),
    MaHinhAnh INT,
    NgayGui DATE,
    NoiDungHoiDap TEXT,
    FOREIGN KEY (MaTaiKhoan) REFERENCES TaiKhoan(Email),
    FOREIGN KEY (MaHinhAnh) REFERENCES HinhAnh(MaHinhAnh)
);

-- Tạo bảng LienHe
CREATE TABLE LienHe (
    MaLienHe INT PRIMARY KEY AUTO_INCREMENT,
    MaTaiKhoan VARCHAR(255),
    NoiDungGopY TEXT,
    NgayGopY DATE,
    FOREIGN KEY (MaTaiKhoan) REFERENCES TaiKhoan(Email)
);
