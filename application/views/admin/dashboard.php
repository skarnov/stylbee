<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN CHART PORTLET-->
        <div class="widget ">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> New Orders</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                            <tr>
                                <th>
                                    Order Total
                                </th>
                                <th>
                                    Order Date & Time
                                </th>
                                <th>
                                    Order Status
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_order as $v_all_order) {
                                ?>
                                <tr>
                                    <td><?php echo $v_all_order->order_total . ' ' . $v_all_order->currency; ?></td>
                                    <td class="center"><?php echo $v_all_order->order_date_time; ?></td>
                                    <td class="center"><?php echo $v_all_order->order_status; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END CHART PORTLET-->
    </div>
    <div class="span6">
        <!-- BEGIN CHART PORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"> </i> Manage Orders</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                            <tr>
                                <th>
                                    Order Total
                                </th>
                                <th>
                                    Order Date & Time
                                </th>
                                <th>
                                    Order Status
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($order as $v_order) {
                                ?>
                                <tr>
                                    <td><?php echo $v_order->order_total . ' ' . $v_order->currency; ?></td>
                                    <td class="center"><?php echo $v_order->order_date_time; ?></td>
                                    <td class="center"><?php echo $v_order->order_status; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>