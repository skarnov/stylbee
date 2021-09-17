<!-- ********************** --> 
<!--     I N T R O          -->
<!-- ********************** -->
<div id="intro">    
    <div id="intro_wrap">        
        <div class="container_12">            
            <div id="breadcrumbs" class="grid_12">                
                <a href="<?php echo base_url();?>">Home</a>                
                &gt;            
            </div>            
            <h1>Stylbee Contact Us</h1>        
        </div>    
    </div>
</div><!-- END OF INTRO -->
<!-- ********************** -->
<!--      C O N T E N T     -->
<!-- ********************** -->
<div id="content" class="container_16">
    <div class="grid_16">
        <div id="content" class="container_16">
            <div class="grid_16">
                <h3 style="color:green">
                    <?php
                    $msg=$this->session->userdata('message');
                    if(isset($msg)){
                    echo $msg;
                    $this->session->unset_userdata('message');
                    }
                    ?>
                </h3>
				<h2 class="s_title_1">
					<span class="s_secondary_color">Send Us A Message</span>
				</h2>                    
				<div class="clear"></div>
                    <?php 
						if(isset($_POST['submit'])){
						$to = "contact@stylbee.com";
						$from = $_POST['email'];
						$name = $_POST['name'];
						$subject = $_POST['subject'];
						$phone = $_POST['phone'];
						$messege  = "Name:" . $name ." ". "Subject:" ." ". $subject ." ". "Phone:" . $phone ." "." Write This Question:" . "\n\n" . $_POST['messege'];
						$headers = "From:" . $from;
						mail($to,$subject,$messege ,$headers);
						echo "Thanks For Contact With Stylbee";
						}
					?>
				<br /><br />	
				<form role="form" class="for-h" name="form1" id="form1" action="" method="post">
						<div class="s_row_2 clearfix">                        
							<label class="required"><strong>Name</strong></label>                        
							<input type="text" size="50" name="name" required err="Please Enter Valide Full Name" regexp="JSVAL_RX_ALPHA" />                    
						</div>
						<div class="s_row_2 clearfix">                        
							<label><strong>Subject</strong></label>                        
							<input type="text" size="50" name="subject" required err="Please Enter Valide Full Name" regexp="JSVAL_RX_ALPHA" />                    
						</div>
						<div class="s_row_2 clearfix">                        
							<label><strong>Phone</strong></label>                        
							<input type="text" size="50" name="phone" required />                    
						</div>
						<div class="s_row_2 clearfix">                        
							<label><strong>Email</strong></label>                        
							<input type="email" name="email" size="50" required err="Please Enter Valide Email Address" regexp="JSVAL_RX_EMAIL" />                    
						</div>
						<div class="s_row_2 clearfix">                        
							<label><strong>Message</strong></label>                        
							<textarea rows="10" cols="90" name="messege" required err="Please Enter Message" regexp="JSVAL_RX_ALPHA_NUMERIC"></textarea>                    
						</div>
						<button type="submit" class="s_button_1 s_main_color_bgr left" name="submit" value="Send" class="botton_s"><span class="s_text">Submit</span></button>
				</form>
                <br /><br />            
            </div>        
        </div>        
        <!-- END OF CONTENT -->     
    </div>
</div><!-- END OF CONTENT --> 