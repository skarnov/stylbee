<!DOCTYPE html>

<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/multizoom.css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/960.css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/screen.css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/color.css" media="screen" />
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>js/shoppica.js"></script>
        <script src="<?php echo base_url(); ?>js/jsval.js"></script>
        <script src="<?php echo base_url(); ?>js/multizoom.js"></script>
        <script type="text/javascript">
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            function makerequest(given_text, objID)
            {
                if (given_text) {
                    serverPage = '<?php echo base_url(); ?>welcome/search_product/' + given_text;
                }
                if (given_text == 0) {
                    document.getElementById(objID).innerHTML = "";
                    return;
                }
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById(objID).innerHTML = xmlhttp.responseText;
                }
                xmlhttp.send(null);
            }
            function set_currency(currency)
            {
                serverPage = '<?php echo base_url(); ?>welcome/set_currency/' + currency;
                xmlhttp.open("GET", serverPage);
                xmlhttp.send(null);
                reload();
            }
        </script>
    </head>
    <body class="s_layout_fixed">
        <div id="wrapper"> 
            <div id="header" class="container_12">
                <div class="grid_12">
                    <a id="site_logo" href="<?php echo base_url(); ?>">Stylbee Store</a> 
                    <div id="system_navigation" class="s_nav">
                        <ul class="s_list_1 clearfix">
                            <?php
                            $customer_id = $this->session->userdata('customer_id');
                            $customer_user_name = $this->session->userdata('customer_user_name');
                            if (!$customer_id) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>welcome/login">Log In</a></li>
                                <li><a href="<?php echo base_url(); ?>welcome/signup">Signup</a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo base_url(); ?>user_administrator/logout">Logout (<?php echo $customer_user_name; ?>)</a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url(); ?>cart/show_cart">Shopping Cart</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/about">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>welcome/contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <?php $currency = $this->session->userdata('currency'); ?>
                    <div class="currency" style="margin-left: 64%; margin-top: 2.9%;">
                        <form action="<?php echo base_url(); ?>welcome" method="POST">
                            <select onchange="set_currency(this.value);">
                                <option><?php echo $currency; ?></option>
                                <option value="BDT">BDT</option>
                                <option value="USD">USD</option>
                                <option value="EURO">EURO</option>
                                <option value="GBP">GBP</option>
                            </select>
                            <input type="submit" value="Set Currency" style="padding: .4%;">
                        </form>
                    </div>                    
                    <div id="currency_switcher" class="s_switcher">
                        <input type="text" id="filter_keyword" placeholder=" Search...." value="" onkeyup = "makerequest(this.value, 'result');" style="width:170px;"/>
                    </div>
                    <div id="categories" class="s_nav">
                        <ul>
                            <li id="menu_home"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <?php foreach ($all_category as $v_category) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>welcome/product_listing/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a>
                                    <div class="s_submenu">
                                        <h3>Inside Categories</h3>
                                        <ul class="s_list_1 clearfix">
                                            <?php
                                            foreach ($all_subcategory as $v_subcategory) {
                                                if ($v_subcategory->category_id == $v_category->category_id && $v_subcategory->sub_category_publication_status == '1') {
                                                    ?>      
                                                    <li><a href="<?php echo base_url(); ?>welcome/product_listing_sub/<?php echo $v_category->category_name; ?>/<?php echo $v_subcategory->sub_category_id; ?>"><?php echo $v_subcategory->sub_category_name; ?></a></li>
                                                    <?php
                                                }
                                            }
                                            ?>     
                                        </ul>  
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
                    $contents = $this->cart->contents();
                    foreach ($contents as $v_contents) {
                        
                    }
                    ?>
                    <?php
                    $subtotal = $this->cart->total();
                    $total = $subtotal;
                    ?>
                    <div id="cart_menu" class="s_nav">
                        <a href="<?php echo base_url(); ?>cart/show_cart"><span class="s_icon"></span><small class="s_text">Cart</small><span class="s_grand_total s_main_color"><?php echo $total; ?> <?php echo $currency; ?></span></a>    
                    </div>
                </div>
            </div>
            <div id="result" ><?php echo $maincontent; ?></div>
            <div class="grid_12 border_eee"></div>			
            <div id="footer" class="container_12">
                <div id="footer_categories" class="clearfix">
                    <div class="grid_2">
                        <h2>Shoes</h2>
                        <ul class="s_list_1">
                            <li><a href="">Socks</a></li>
                            <li><a href="">Casual Shoes</a></li>
                            <li><a href="">Sports Shoes</a></li>
                            <li><a href="">Formal Shoes</a></li>
                            <li><a href="">Slippers & Flip Flops</a></li>
                        </ul>
                    </div>
                    <div class="grid_2">
                        <h2>Clothing</h2>
                        <ul class="s_list_1">
                            <li><a href="">Jackets</a></li>
                            <li><a href="">Dresses</a></li>
                            <li><a href="">Shorts & Skirts</a></li>
                            <li><a href="">Pants / Trousers</a></li>
                            <li><a href="">Jeans & Jeggings</a></li>
                            <li><a href="">Leggings & Capris</a></li>
                            <li><a href="">Shirts, Tops & Tees</a></li>
                        </ul>
                    </div>
                    <div class="grid_2">
                        <h2>Ethnic Wear</h2>
                        <ul class="s_list_1">
                            <li><a href="">Lungi</a></li>
                            <li><a href="">Kurtas</a></li>
                            <li><a href="">Fotuas</a></li>
                            <li><a href="">Panjabi</a></li>
                            <li><a href="">Pyjamas</a></li>
                            <li><a href="">Sherwani</a></li>
                            <li><a href="">Dhoti Pants</a></li>
                        </ul>
                    </div>
                    <div class="grid_2">
                        <h2>Winter Wear</h2>
                        <ul class="s_list_1">
                            <li><a href="">Jackets & Blazers</a></li>
                            <li><a href="">Full Sleeve T- Shirts</a></li>
                            <li><a href="">Warm & Light Hoodies</a></li>
                            <li><a href="">Sweaters & Sweatshirts</a></li>
                            <li><a href="">Gloves, Mufflers & Scarves</a></li>
                        </ul>
                    </div>
                    <div class="grid_2">
                        <h2>Women Footwear</h2>
                        <ul class="s_list_1">
                            <li><a href="">Boots</a></li>
                            <li><a href="">Sandals</a></li>
                            <li><a href="">All Heels</a></li>
                            <li><a href="">Flats & Ballets</a></li>
                            <li><a href="">Slippers & Flip Flops</a></li>
                            <li><a href="">Casual & Sports Shoes</a></li>
                        </ul>
                    </div>
                    <div class="grid_2">
                        <h2>Accessories</h2>
                        <ul class="s_list_1">
                            <li><a href="">Optics</a></li>
                            <li><a href="<?php echo base_url() ?>welcome/product_listing_sub/Accessories/22">Wallets</a></li>
                            <li><a href="">Lighting</a></li>
                            <li><a href="">Watches</a></li>
                            <li><a href="">Watches</a></li>
                            <li><a href="">Grooming</a></li>
                            <li><a href="">Jewellery</a></li>
                            <li><a href="">Caps & Hats</a></li>
                            <li><a href="">Belt, Ties & Cufflinks</a></li>
                        </ul>
                    </div>
                </div>	
                <div class="clear"></div>
                <div id="welcome" class="grid_12">
                    <h2>Welcome To Stylbee</h2>
                    <p>
                        Stylbee is a leading destination for online shopping in Bangladesh, offering some of the best prices and a 
                        completely hassle-free experience with options of paying through Cash on Delivery, Debit Card, Credit Card 
                        and Net Banking processed through secure and trusted gateways. Now your necessary items are available for 
                        quick shopping. Browse through our cool lifestyle accessories, apparel and footwear brands featured on our 
                        site with expert descriptions to help you arrive at the wise buying decision. Stylbee also offers free home 
                        delivery for many of our products along with easy EMI options. Get the best prices and the best online 
                        shopping experience every time, GUARANTEED!
                    </p>
                </div>
                <div class="grid_12 border_eee"></div>
                <div id="footer_categories" class="clearfix">
                    <div class="grid_4">
                        <h2>Quick List</h2>
                        <ul class="s_list_1" style="font-size: 20px;line-height: 27px;">
                            <li><a href="<?php echo base_url() ?>welcome/new_arival">New Arival</a></li>
                            <li><a href="<?php echo base_url() ?>welcome/top_seller">Top Seller</a></li>
                            <li><a href="<?php echo base_url() ?>welcome/big_discount">Big Discount</a></li>
                            <li><a href="<?php echo base_url() ?>welcome/special_product">Special Product</a></li>
                            <li><a href="<?php echo base_url() ?>user_manager/forgot_password">Forgot Password?</a></li>
                            <li><a href="">How To Buy Online</a></li>
                            <li><a href="">Privacy Statement</a></li>
                            <li><a href="">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="grid_4">
                        <h2>Contact Us</h2>
                        <br/>
                        <tr>
                            <td valign="middle"><span class="s_icon_32"><span class="s_icon s_phone_32" style="background-color: rgb(113, 176, 19);"></span>+8801721186268 <br /></span></td>
                        </tr>
                        <br/>
                        <tr>
                            <td valign="middle"><span class="s_icon_32"><span class="s_icon s_phone_32" style="background-color: rgb(113, 176, 19);"></span>+8801711357285 <br /></span></td>
                        </tr>
                    </div>
                    <div id="facebook" class="grid_4" style="background-color: white;width: 299px;">
                        <div id="fb-root"></div>
                        <script>
                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <div class="fb-like-box" data-href="https://www.facebook.com/stylbee/" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="grid_12 border_eee"></div>			
                <div id="payments" class="right clearfix">
                    <img src="<?php echo base_url(); ?>images/payments/paypal_straight_32px.png" alt="" />
                    <img src="<?php echo base_url(); ?>images/payments/visa_straight_32px.png" alt="" />
                </div>
                <p id="copy">&copy; Copyright 2014 Stylbee </br> All Rights Reserved</p>
            </div>
        </div>
    </body>
</html>