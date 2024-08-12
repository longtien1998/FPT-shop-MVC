<?php include_once(realpath('') . '\\views\\layouts\\begin.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách Tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Danh sách Tài khoản</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header row align-items-center justify-content-between m-0">
                            <div class="col">
                                <h3 class="card-title m-0 mr-4">Danh sách Admin</h3>
                                <form action="" class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                        <button class="btn btn-primary"><i class='bx bx-search-alt-2'></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <a href="index.php?accountAdminadd" class=" btn btn-primary float-right">+ Add Admin</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:3%">STT</th>
                                        <th style="width:8%">Hình ảnh</th>
                                        <th scope="col">Họ & Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số ĐT</th>
                                        <th style="width:10%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    
                                    foreach ($data as $key) { ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo isset($key['HinhAnh']) ? $key['HinhAnh'] : ""; ?></td>
                                            <td><?php echo $key['ho'] . " " . $key['tenLot'] . " " . $key['ten']; ?></td>
                                            <td><?php echo $key['email']; ?></td>
                                            <td><?php echo $key['soDienThoai']; ?></td>
                                            <td>
                                                <a class="mx-2 chucnang infoshow" data-index="<?php echo $i-1;?>" data-toggle="modal" data-target="#exampleModal2" href="" role="button"><i class=" text-warning fa fa-eye"></i></a>
                                                <a class="mx-2 chucnang <?php echo $key['email'] == $_SESSION["email-admin"] ? "d-none" : "" ;?>" href="index.php?accountNhanvienupdate&<?php echo $key['email']; ?>"><i class='text-green bx bx-edit'></i></a>
                                                <a class="mx-2 chucnang xoa <?php echo $key['email'] == $_SESSION["email-admin"] ? "d-none" : "" ;?>" data-toggle="modal" data-target="#exampleModal1" href="index.php?accountAdmin&<?php echo $key['email']; ?>"><i class='text-danger bx bxs-trash'></i></a>


                                            </td>
                                        </tr>
                                    <?php $i++;
                                    }; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="profile-img mx-auto bg-blue rounded-circle">
                        <img src="" alt="" class="bg-primary">
                    </div>
                    <div class="profile-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Họ và tên: <span class="float-right" id="nameproduct"></span></li>
                            <li class="list-group-item">Email: <span class="float-right" id="emailproduct"></span></li>
                            <li class="list-group-item">Số điện thoại: <span class="float-right" id="sdtproduct"></span></li>
                            <li class="list-group-item">Giới tính: <span class="float-right" id="gtproduct"></span></li>
                            <li class="list-group-item">Ngày sinh: <span class="float-right" id="ngsproduct"></span></li>
                            <li class="list-group-item">CCCD: <span class="float-right" id="cccdproduct"></span></li>
                            <li class="list-group-item">Chức vụ: <span class="float-right" id="cvproduct"></span></li>
                            <li class="list-group-item">Ca làm việc: <span class="float-right" id="caproduct"></span></li>
                            <li class="list-group-item">Ngày vào làm: <span class="float-right" id="ngvlproduct"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="ok">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.xoa').forEach(deleteLink => {
        deleteLink.addEventListener('click', function(event) {
            // Ngăn chặn hành động mặc định của thẻ a
            event.preventDefault();

            currentDeleteLink = this;
        });
    });
    document.getElementById('ok').addEventListener('click', () => {

        window.location.href = currentDeleteLink.href;
    });

    document.querySelectorAll('.infoshow').forEach(deleteLink => {
        deleteLink.addEventListener('click', function(event) {
            // Ngăn chặn hành động mặc định của thẻ a
            event.preventDefault();
            const dataIndex = this.getAttribute('data-index');
            
            const a = <?php echo json_encode($data); ?>;
            // document.write(a);
            
            if (a) {
                const item = a[dataIndex];
                // document.write(item);
                if (item) {
                    const itemName = `${item['ho']} ${item['tenLot']} ${item['ten']}`;
                    const itemEmail = item['email'];
                    const itemSdt = item['soDienThoai'];
                    const itemGioiTinh = item['gioiTinh'];
                    const itemNgaySinh = item['ngaySinh'];
                    const itemCCCD = item['CCCD'];
                    const itemChucVu = item['ChucVu'];
                    const itemNgayVaoLam = item['ngayVaoLam'];
                    const itemThoiGianCa = item['ThoiGianCa'];
                    
                    // console.log(itemName);
                    document.getElementById('nameproduct').innerText = itemName;
                    document.getElementById('emailproduct').innerText = itemEmail;
                    document.getElementById('sdtproduct').innerText = itemSdt;
                    document.getElementById('gtproduct').innerText = itemGioiTinh;
                    document.getElementById('ngsproduct').innerText = itemNgaySinh;
                    document.getElementById('cccdproduct').innerText = itemCCCD;
                    document.getElementById('cvproduct').innerText = itemChucVu;
                    document.getElementById('ngvlproduct').innerText = itemNgayVaoLam;
                    document.getElementById('caproduct').innerText = itemThoiGianCa;
                }
            }
        });
    });
</script>
<?php include_once(realpath('') . '\\views\\layouts\\end.php'); ?>