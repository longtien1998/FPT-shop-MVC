<?php include_once(realpath('') . '\\views\\layouts\\begin.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới Tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item "><a href="#">Danh sách Tài khoản</a></li>
                        <li class="breadcrumb-item active">Thêm mới Admin</li>
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
                            <h3 class="card-title col m-0">Thêm mới Admin
                            </h3>
                            <div class="col">
                                <a href="index.php?accountAdmin" class=" btn btn-primary float-right">Danh sách Admin</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip01">Họ</label>
                                        <input type="text" class="form-control" name="ho" id="validationTooltip01" required>
                                        <div class="invalid-tooltip">
                                            Hãy nhập họ.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip02">Tên lót</label>
                                        <input type="text" class="form-control" name="tenlot" id="validationTooltip02" required>
                                        <div class="invalid-tooltip">
                                            Hãy nhập tên lót.
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip03">Tên</label>
                                        <input type="text" class="form-control" name="ten" id="validationTooltip03" required>
                                        <div class="invalid-tooltip">
                                            Hãy nhập tên.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 ">
                                        <label for="validationTooltip04">Email</label>

                                        <input type="email" class="form-control" name="email" id="validationTooltip04" required autocomplete="email">
                                        <div class="invalid-tooltip">
                                            Hãy nhập email.
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-5">
                                        <label for="validationTooltip5">Giới tính</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="gioitinh" required>
                                            <label class="custom-control-label" for="customControlValidation1">Nan</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="gioitinh" required>
                                            <label class="custom-control-label" for="customControlValidation2">Nữ</label>
                                            <div class="invalid-tooltip">Vui lòng chọn giới tính</div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="validationTooltip06">Ngày sinh</label>
                                        <input type="date" class="form-control" id="validationTooltip06" name="ngaysinh" required>
                                        <div class="invalid-tooltip">
                                            Vui lòng chọn ngày sinh.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 ">
                                        <label for="validationTooltip07">Mật khẩu</label>

                                        <input type="password" class="form-control pass" name="password" id="validationTooltip07" required autocomplete="new-password">
                                        <i class="bx bx-low-vision toggle-password" id="vision-1" toggle="#passwordField"></i>
                                        <div class="invalid-tooltip">
                                            Hãy nhập mật khẩu.
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="validationTooltip08">Nhập lại Mật khẩu</label>

                                        <input type="password" class="form-control forgot-pass" id="validationTooltip08" required autocomplete="new-password">
                                        <i class="bx bx-low-vision" id="vision-2"></i>
                                        <div class="invalid-tooltip">
                                            Nhập lại mật khẩu không đúng.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
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

<!-- jQuery -->

<script>
    $(document).ready(function() {
        $('#validationTooltip08').focusout(function() {
            $('#validationTooltip08').trigger('input');
        });

        $('#validationTooltip08').on('input', function() {
            if ($(this).val() !== $('#validationTooltip07').val()) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');

            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("vision-1").addEventListener("click", function() {
            const type = document.querySelector(".pass").getAttribute("type") == "password" ? 'text' : 'password';
            document.querySelector(".pass").setAttribute('type', type);
        });
        document.getElementById("vision-2").addEventListener("click", function() {
            const type = document.querySelector(".forgot-pass").getAttribute("type") == "password" ? 'text' : 'password';
            document.querySelector(".forgot-pass").setAttribute('type', type);
        });
        document.querySelector(".needs-validation").addEventListener('submit', function(event) {
            const passValue = document.getElementById('validationTooltip07').value;
            const confirmPassValue = document.getElementById('validationTooltip08').value;

            if (passValue !== confirmPassValue) {
                // Ngăn chặn việc submit form nếu mật khẩu không khớp
                document.querySelector(".needs-validation").preventDefault();
                // Hiển thị thông báo lỗi
            }
        });
    });
    // Sass map from `_variables.scss`
    // Override this and recompile your Sass to generate different states


    // Loop from `_forms.scss`
    // Any modifications to the above Sass map will be reflected in your compiled
    // CSS via this loop.
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<?php include_once(realpath('') . '\\views\\layouts\\end.php'); ?>