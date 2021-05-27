<?php
include 'header.php';
?>
<script id="jsbin-javascript">
    (function(global) {
        if (typeof(global) === "undefined") {
            throw new Error("window is undefined");
        }
        var _hash = "!";
        var noBackPlease = function() {
            global.location.href += "#";
            // making sure we have the fruit available for juice....
            // 50 milliseconds for just once do not cost much (^__^)
            global.setTimeout(function() {
                global.location.href += "!";
            }, 50);
        };
        // Earlier we had setInerval here....
        global.onhashchange = function() {
            if (global.location.hash !== _hash) {
                global.location.hash = _hash;
            }
        };
        global.onload = function() {
            noBackPlease();
            // disables backspace on page except on input fields and textarea..
            document.body.onkeydown = function(e) {
                var elm = e.target.nodeName.toLowerCase();
                if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                    e.preventDefault();
                }
                // stopping event bubbling up the DOM tree..
                e.stopPropagation();
            };
        };
    })(window);
</script>
<div class="main main-raised">

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div id="get_category">
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal">
                                <div class="noUi-base">
                                    <div class="noUi-origin" style="left: 0%;">
                                        <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="1.00" style="z-index: 5;"></div>
                                    </div>
                                    <div class="noUi-connect" style="left: 0%; right: 0%;"></div>
                                    <div class="noUi-origin" style="left: 100%;">
                                        <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="999.00" style="z-index: 4;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div id="get_brand">
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        <div id="get_product_home">
                            <!-- product widget -->

                            <!-- product widget -->
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row" id="product-row">
                        <div class="col-md-12 col-xs-12" id="product_msg">
                        </div>
                        <!-- product -->
                        <?php
                        /////
                        $search = isset($_GET['search']) ? $_GET['search'] : "";
                        if ($search) {
                            $product_query = "SELECT * FROM products WHERE product_title || product_price like '%$search%'";
                            $run_query = mysqli_query($con, $product_query);
                            if (mysqli_num_rows($run_query) > 0) {

                                while ($row = mysqli_fetch_array($run_query)) {
                                    $pro_id    = $row['product_id'];
                                    $pro_cat   = $row['product_cat'];
                                    $pro_brand = $row['product_brand'];
                                    $pro_title = $row['product_title'];
                                    $pro_price = $row['product_price'];
                                    $pro_image = $row['product_image'];



                                    echo "
                
                        
                        <div class='col-md-4 col-xs-6' >
                                <a href='product.php?p=$pro_id'><div class='product'>
                                    <div class='product-img'>
                                        <img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
                                        <div class='product-label'>
                                            <span class='sale'>-30%</span>
                                            <span class='new'>NEW</span>
                                        </div>
                                    </div></a>
                                    <div class='product-body'>
                                        
                                        <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
                                        <h4 class='product-price header-cart-item-info'>$pro_price VNĐ<del class='product-old-price'>990.00VNĐ</del></h4>
                                        <div class='product-rating'>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                            <i class='fa fa-star'></i>
                                        </div>
                                        
                                    </div>
                                    <div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i>Thêm vào giỏ hàng</button>
										echo'Them vao gio hang thanh cong';
                                    </div>
                                </div>
                            </div>
                        
            ";
                                };
                            }
                        }

                        ?>



                        <!--Here we get product jquery Ajax Request-->
                    </div>

                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination" id="pageno">
                        <li><a class="active" href="#aside">1</a></li>

                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
</div>
<?php
include "newslettter.php";
include "footer.php";
?>