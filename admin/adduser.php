 <?php
  session_start();
  include("../db.php");
  include "sidenav.php";
  include "topheader.php";
  if (isset($_POST['btn_save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $mobile = $_POST['phone'];
    $address1 = $_POST['city'];
    $address2 = $_POST['country'];

    mysqli_query($con, "insert into user_info(first_name, last_name,email,password,mobile,address1,address2) values ('$first_name','$last_name','$email','$user_password','$mobile','$address1','$address2')")
      or die("Query 1 is inncorrect........");
    header("location: manage_users.php");
    mysqli_close($con);
  }


  ?>
 <!-- End Navbar -->
 <div class="content">
   <div class="container-fluid">
     <!-- your content here -->
     <div class="col-md-12">
       <div class="card">
         <div class="card-header card-header-primary">
           <h4 class="card-title">Thêm Người Dùng</h4>
           <p class="card-category">Thêm Thông Tin</p>
         </div>
         <div class="card-body">
           <form action="" method="post" name="form" enctype="multipart/form-data">
             <div class="row">

               <div class="col-md-3">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Họ</label>
                   <input type="text" id="first_name" name="first_name" class="form-control" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Tên</label>
                   <input type="text" name="last_name" id="last_name" class="form-control" required>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Email</label>
                   <input type="email" name="email" id="email" class="form-control" required>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Mật Khẩu</label>
                   <input type="password" id="password" name="password" class="form-control" required>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-12">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">SĐT</label>
                   <input type="text" id="phone" name="phone" class="form-control" required>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-4">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Thành Phố</label>
                   <input type="text" name="city" id="city" class="form-control" required>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group bmd-form-group">
                   <label class="bmd-label-floating">Địa Chỉ</label>
                   <input type="text" name="country" id="country" class="form-control" required>
                 </div>
               </div>

             </div>

             <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Cập Nhật Người Dùng</button>
             <div class="clearfix"></div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
 <?php
  include "footer.php";
  ?>