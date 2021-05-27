<?php
session_start();
include("../db.php");

error_reporting(0);
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
  $order_id = $_GET['order_pro_id'];

  /*this is delet query*/
  mysqli_query($con, "delete from order_products where order_pro_id='$order_id'") or die("delete query is incorrect...");
}

///pagination
$page = $_GET['page'];

if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <!-- your content here -->
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Orders / Page <?php echo $page; ?> </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>Tên Khách Hàng</th>
                  <th>Sản Phẩm</th>
                  <th>Liên Hệ </th>
                  <th>Địa Chỉ</th>
                  <th>Thành Phố</th>
                  <th>Giá</th>
                  <th>Ngay</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "select order_pro_id,product_title, f_name,mobile,address,state,zip,expdate,total_amt from orders_info,order_products,products,user_info where orders_info.order_id=order_products.order_id and order_products.product_id=products.product_id and orders_info.user_id=user_info.user_id Limit $page1,10") or die("query 1 incorrect.....");

                while (list($order_id,$p_names, $cus_name, $contact_no, $address, $details, $zip_code, $time, $quantity) = mysqli_fetch_array($result)) {
                  echo "<tr><td>$cus_name</td><td>$p_names</td><td>$contact_no</td><td>$address<br>ZIP: $zip_code<br>$country</td><td>$details</td><td>$quantity</td><td>$time</td>

                        <td>
                        <a class=' btn btn-danger' href='orders.php?order_pro_id=$order_id&action=delete'>Delete</a>
                        </td></tr>";
                }
                ?>
              </tbody>
            </table>

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include "footer.php";
?>