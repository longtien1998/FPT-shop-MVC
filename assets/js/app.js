// $('.carousel').carousel();

// Khi người dùng cuộn chuột thì gọi hàm scrollFunction
window.onscroll = function () { scrollFunction() };
// khai báo hàm scrollFunction
function scrollFunction() {
    // Kiểm tra vị trí hiện tại của con trỏ so với nội dung trang
    if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
        //nếu lớn hơn 2000px thì hiện button
        document.querySelector(".lendau").style.display = "block";
    } else {
        //nếu nhỏ hơn 20px thì ẩn button
        document.querySelector(".lendau").style.display = "none";
    }
}
//gán sự kiện click cho button
document.querySelector('.lendau').addEventListener("click", function () {
    //Nếu button được click thì nhảy về đầu trang
    window.scrollTo({
        top: 0,
        behavior: `smooth`
    })
});

// tìm kiếm
$(document).ready(function () {
    //khi go phim vao o textbox
    $("#key").keyup(function () {
        //lay gia tri vua nhap vao
        var strKey = $("#key").val();
        //ham trim() loai bo khoang trang
        strKey = strKey.trim();
        //chuyển về chữ thường
        strKey = strKey.toLowerCase();
        if (strKey != "") {
            //hien thi the html co class=smart-search
            $(".smart-search").attr("style", "display:block");
            //---
            //ajax de lay du lieu
            // console.log(strKey);
            $.ajax({
                url: "index.php?search&" + strKey,
                success: function (result) {
                    //clear tat ca cac the li
                    $(".smart-search ul").empty();
                    //them ket qua vua tim thay
                    $(".smart-search ul").append(result);
                }
            });
            //---
        } else
            $(".smart-search").attr("style", "display:none");
    });
});
$(document).ready(function(){
    const btn = document.querySelectorAll(".submitBtn");
    btn.forEach(ele => {
        $(ele).click(function(){
            var formData = $('#input').val();
            var url = 'index.php?cartcreate&' + formData; // Thêm dữ liệu từ form vào URL
            // console.log("hi");
            $.ajax({
                // type: 'GET', // Sử dụng phương thức GET
                url: url,
                success: function(response){
                    // Xử lý phản hồi
                    // console.log("hi");
                    $('#result').html(response);
                }
            });
        });
    });
   
});

// Hiển thị thông báo thành công và ẩn đi sau 5 giây
function showSuccessMessage() {
    var successMessage = document.getElementById('successMess');
    successMessage.classList.remove('hidden'); // Hiển thị thông báo
    setTimeout(function() {
        successMessage.classList.add('hidden'); // Ẩn thông báo sau 5 giây
    }, 8000);
}

// Gọi hàm showSuccessMessage() khi cần hiển thị thông báo thành công
// showSuccessMessage();

// login

if(document.getElementById('setregister')){
    document.getElementById('setregister').addEventListener("click",function(){
        document.getElementById('signin').style.display="none";
        document.getElementById('signup').style.display="block";
        window.scrollTo({
            top: 160,
            behavior: `smooth`
        })
    })
}
if(document.getElementById('setlogin')){
    document.getElementById('setlogin').addEventListener("click",function(){
        document.getElementById('signin').style.display="block";
        document.getElementById('signup').style.display="none";
        window.scrollTo({
            top: 0,
            behavior: `smooth`
        })
    })
}


// upload file user
function show(){
    document.getElementById('upload-file').addEventListener("click",function(){
    // console.log("hiện");
    document.getElementById('up-file').style.display === "none" ? document.getElementById('up-file').style.display = "block" : document.getElementById('up-file').style.display = "";
    })
};

// thông báo thành công
document.addEventListener("DOMContentLoaded", function() {
    let successMessage = document.getElementById("successMessage");
  
    // Hiển thị thông báo thành công
    if(successMessage){
                // Hiển thị thông báo thành công
        successMessage.classList.add("show");
        successMessage.style.top = "100px";

        // Ẩn thông báo sau 3 giây
        setTimeout(function () {
            successMessage.style.top = "0";
            successMessage.classList.remove("show");
            
        }, 5000);
    }
});

// update thông tin trong user


// window.onload = function(){
//     // document.addEventListener("DOMContentLoaded", function () {
//     //     let set = document.getElementById('set-info-user');
//     //     let info = document.getElementById("info");
//     //     let update = document.getElementById("update");
        
//     //     set.addEventListener('click', function () {
//     //             info.style.display="none";
//     //             update.style.display="block";
//     //         });
//     // });


//     document.getElementById('set-info-user').addEventListener("click",function (){
//         // document.querySelector(".info").style.display="none";
//         // document.querySelector(".update").style.display="block";
//         console.log("hi");
    
//     });
// }

// $(document).ready(function(){
//     $('#submitBtn').click(function(){
//         var formData = $('#myForm').serialize();
//         $.ajax({
//             type: 'POST',
//             url: 'index.php?test',
//             data: formData,
//             success: function(response){
//                 $('#result').html(response);
//             }
//         });
//     });
// });
// document.getElementById('setpass').addEventListener("click",function (){
//     document.getElementById("getpass").classList.remove("getpass");
//     document.getElementById("update").style.display="none";
//     // console.log("hi");

// });

// xác thực nút xóa

const linkElements = document.querySelectorAll('.product-delete');

linkElements.forEach(function(linkElement) {
   
    linkElement.addEventListener('click', function(event) {
        // Ngăn chặn hành vi mặc định của trình duyệt khi nhấn vào liên kết
        event.preventDefault();

        const isConfirmed = confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
        
        if (isConfirmed) {
            window.location.href = linkElement.href;
        } else {
            return false;
        }
    });
});
// Thay đổi URL mà không làm tải lại trang
function changeURL(url) {
    window.history.pushState({}, '', url);
}


const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type}  row justify-content-between m-0" role="alert">`,
    `   <div class="align-middle col"><span class="">${message}</span></div>`,
    '   <div class="col-3"><button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button></div>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
  setTimeout(function () {
    alertPlaceholder.style.marginRight="-1000px";
    // alertPlaceholder.style.opacity="0";

    
}, 4000);
setTimeout(function () {
    alertPlaceholder.removeChild(wrapper);
    
}, 6000);
    

}

 
