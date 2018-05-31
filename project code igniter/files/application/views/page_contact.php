<?php $this->load->view('header'); ?>
<div class="container">

<h1>Contact</h1>
<hr>

<div class="row">
        <form method="post" action="<?php echo base_url(); ?>contact/">
        <div class="col-md-6">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" id="senderName" class="form-control" placeholder="Full Name" value="<?php echo set_value('name'); ?>">
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" id="senderEmail" class="form-control" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" id="senderPhone" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="message" id="senderMessage" rows="8" placeholder="Please enter your message"><?php echo set_value('message'); ?></textarea>
            <span class="text-danger"><?php echo form_error('message'); ?></span>
          </div>

        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success pull-left btn-contact-go">Submit</button>
        </div>
        </form>  
        

        
        <br><br>

        <div class="col-md-12 clearfix">
          <?php echo $this->session->flashdata('msg'); ?>
        </div>



  </div>

</div>
<?php $this->load->view('footer'); ?>