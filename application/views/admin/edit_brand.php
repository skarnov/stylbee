<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Edit Brand</h4>
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
                <form name="myForm" onsubmit="return validateForm()" class="form-horizontal" action="<?php echo base_url();?>super_admin/update_brand" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Brand Name</label>
                        <div class="controls">
                            <input type="text" name="brand_name" class="span12 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo $brand_info->brand_name;?>">
                            <input type="hidden" name="brand_id" class="span6 typeahead" id="typeahead"  value="<?php echo $brand_info->brand_id;?>" >
                        </div>
                    </div>        
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status</label>
                        <select name="brand_publication_status" class="span6 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                            <option>Please Select One</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit" value="Submit" class="btn btn-primary" name="btn">Edit Brand</button>
                    </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>