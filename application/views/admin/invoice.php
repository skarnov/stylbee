<style type="text/css">
    /* content editable */
    *[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }
    *[contenteditable] { cursor: pointer; }
    .container{}
    span[contenteditable] { display: inline-block; }
    /* heading */
    h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }
    /* table */
    table { font-size: 75%; table-layout: fixed; width: 100%; }
    table { border-collapse: separate; border-spacing: 2px; }
    th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
    th, td { border-radius: 0.25em; border-style: solid; }
    th { background: #EEE; border-color: #BBB; }
    td { border-color: #DDD; }
    /* header */
    header { margin: 0 0 3em; }
    header:after { clear: both; content: ""; display: table; }
    header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
    header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
    header address p { margin: 0 0 0.25em; }
    header span, header img { display: block; float: right; }
    header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
    header img { max-height: 100%; max-width: 100%; }
    header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }
    /* article */
    article, article address, table.meta, table.inventory { margin: 0 0 3em; }
    article:after { clear: both; content: ""; display: table; }
    article h1 { clip: rect(0 0 0 0); position: absolute; }
    article address { float: left; font-size: 125%; font-weight: bold; }
    /* table meta & balance */
    table.meta, table.balance { float: right; width: 36%; }
    table.meta:after, table.balance:after { clear: both; content: ""; display: table; }
    /* table meta */
    table.meta th { width: 50%; }
    table.meta td { width: 50%; }
    /* table items */
    table.inventory { clear: both; width: 100%; }
    table.inventory th { font-weight: bold; text-align: center; }
    table.inventory td:nth-child(1) { width: 26%; }
    table.inventory td:nth-child(2) { width: 38%; }
    table.inventory td:nth-child(3) { text-align: right; width: 12%; }
    table.inventory td:nth-child(4) { text-align: right; width: 12%; }
    table.inventory td:nth-child(5) { text-align: right; width: 12%; }
    /* table balance */
    table.balance th, table.balance td { width: 50%; }
    table.balance td { text-align: right; }
    /* aside */
    aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
    aside h1 { border-color: #999; border-bottom-style: solid; }
    /* table billing */
    table.billing, 
    table.billing:after, table.balance:after { clear: both; content: ""; display: table; }
    /* table billing */
    table.billing th { width: 40%; }
    table.billing td { width: 100%; }
</style>

<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Stylbee Invoice</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <header>
                        <h1>Stylbee Invoice</h1>
                        <address contenteditable>
                            <p><?php echo $order_info->customer_first_name . ' ' . $order_info->customer_last_name; ?></p>
                            <p><?php echo $order_info->customer_address_permanent; ?></p>
                            <p><?php echo $order_info->customer_phone; ?></p>
                            <p><?php echo $order_info->customer_country; ?></p>
                        </address>
                    </header>
                    <article>
                        <h1>Recipient</h1>
                        <address contenteditable>
                            <p style="color:orange;"><strong>Stylbee</strong><br>support@stylbee.com</p>
                        </address>
                        <table class="meta">
                            <tr>
                                <th><span contenteditable>Invoice ID</span></th>
                                <td><span contenteditable><?php echo '#INV' . '' . $order_info->customer_id . '' . $order_info->shipping_id; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Date</span></th>
                                <td><span contenteditable><?php echo $order_info->order_date_time; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Shipping Method</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->shipping_method_type; ?></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Payment Method</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->payment_type; ?></td>
                            </tr>
                        </table>
                        <table class="billing">
                            <tr>
                                <th style="color:red;"><span contenteditable>Billing Details</span></th>
                            </tr>
                            <tr>
                                <th><span contenteditable>Name</span></th>
                                <td><span contenteditable><?php echo $order_info->billing_first_name . ' ' . $order_info->billing_last_name; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Phone</span></th>
                                <td><span contenteditable><?php echo $order_info->billing_phone; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Email</span></th>
                                <td><span contenteditable><?php echo $order_info->billing_email; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Address</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->billing_address; ?></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>City</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->billing_city; ?></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Country</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->billing_country; ?></td>
                            </tr>
                        </table>
                        <table class="billing">
                            <tr>
                                <th style="color:red;"><span contenteditable>Shipping Details</span></th>
                            </tr>
                            <tr>
                                <th><span contenteditable>Name</span></th>
                                <td><span contenteditable><?php echo $order_info->shipping_first_name . ' ' . $order_info->shipping_last_name; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Phone</span></th>
                                <td><span contenteditable><?php echo $order_info->shipping_phone; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Email</span></th>
                                <td><span contenteditable><?php echo $order_info->shipping_email; ?></span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Address</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->shipping_address; ?></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>City</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->shipping_city; ?></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Country</span></th>
                                <td><span id="prefix" contenteditable><?php echo $order_info->shipping_country; ?></td>
                            </tr>
                        </table>
                        <table class="balance">
                            <tr>
                                <th style="color:red;"><span contenteditable>Total</span></th>
                                <td><span data-prefix></span><span><?php echo $order_info->order_total . ' ' . $order_info->currency; ?></span></td>
                            </tr>
                            <tr>
                                <th style="color:red;"><span contenteditable>Payment Status</span></th>
                                <td><span data-prefix><?php echo $order_info->order_status; ?></span></td>
                            </tr>
                        </table>
                    </article>
                    <aside>
                        <h4 style="text-align:center">Thank You</h4>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>