<div class="row-fluid">
    <div class="span12">
        <div class="widget red">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Manage Orders</h4>
                <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <div class="box-content">
                    <h3 style="color:green">
                        <?php
                        $msg=$this->session->userdata('message');
                        if(isset($msg)){
                        echo $msg;
                        $this->session->unset_userdata('message');
                        }
                        ?>
                    </h3>
                <table class='table table-striped' style='margin-bottom:0;'>
                    <thead>
                        <tr>
                            <th>
                                Customer Name			  
                            </th>
                            <th>
                                Order Total
                            </th>
                            <th>
                                Order Date & Time
                            </th>
                            <th>
                                Order Status
                            </th>
                            <th>
                                Actions
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($all_order as $v_all_order)
                            {
                        ?>
                        <tr>
                            <td><?php echo $v_all_order->customer_first_name.' '.$v_all_order->customer_last_name;?></td>
                            <td><?php echo $v_all_order->order_total.' '.$v_all_order->currency;?></td>
                            <td class="center"><?php echo $v_all_order->order_date_time;?></td>
                            <td class="center"><?php echo $v_all_order->order_status;?></td>
                            <td class="center">
                                <?php if($v_all_order->order_status=='Paid')
                                    {
                                ?>
                                <a class="btn btn-inverse" href="<?php echo base_url();?>super_admin/pending_order/<?php echo $v_all_order->order_id;?>" onclick="return check_unpublish();">
                                    <i class="icon-remove"> Pending</i>  
                                </a>
                                <?php
                                    }
                                    if($v_all_order->order_status=='Pending'){
                                ?>
                                <a class="btn btn-success" href="<?php echo base_url();?>super_admin/paid_order/<?php echo $v_all_order->order_id;?>" onclick="return check_publish();">
                                    <i class="icon-ok"> Paid</i>  
                                </a>
                                <?php
                                    }
                                ?>
                                <a class="btn btn-info" href="<?php echo base_url();?>super_admin/invoice/<?php echo $v_all_order->order_id;?>" >
                                    <i class="icon-edit icon-white"> Invoice</i>  
                                </a>
                                <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_order/<?php echo $v_all_order->order_id;?>" title="Delete" onclick="return check_delete();">
                                    <i class="icon-trash icon-white"> Delete</i> 
                                </a>
                            </td>
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