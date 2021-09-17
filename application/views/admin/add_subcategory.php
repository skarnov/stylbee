<div class="row-fluid">
    <div class="span12">
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Add Subcategory</h4>
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
                <form name="myForm" onsubmit="return validateForm()" class="form-horizontal" action="<?php echo base_url();?>super_admin/save_subcategory" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Select Category</label>
                        <select name="category_id" class="span4 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                            <option>Select Category</option>
                            <?php
                                foreach ($all_category as $v_allcategory) {
                            ?>
                                <option value="<?php echo $v_allcategory->category_id;?>"><?php echo $v_allcategory->category_name;?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Subcategory Name</label>
                        <div class="controls">
                            <input type="text" name="sub_category_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>        
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Publication Status</label>
                        <select name="sub_category_publication_status" class="span4 typeahead" id="typeahead" data-provide="typeahead" style="margin-left: 1.8%;">
                            <option>Please Select One</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit" value="Submit" class="btn btn-primary" name="btn">Add Subcategory</button>
                    </div>
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>