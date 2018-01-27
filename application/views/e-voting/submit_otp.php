<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->


    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/starter-template.css" rel="stylesheet">
    
    <title>OTP Verification</title>
      </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Neusa E-voting Platform</a>
        </div>
          <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>Autharization/Logout">Logout</a></li>
        
      </ul
      </div>
    </nav>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4 top">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">OTP Verification</h3>
            <?php if(!$this->session->flashdata('otp_status')): ?>
          <?php echo '<div class="alert alert-success">' .$this->session->flashdata('Failed'). '</div>'?> 
          <?php endif; ?>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="<?php echo base_url(); ?>Autharization/ev_otp">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Enter Your OTP Here" name="opt" type="text">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="varify_otp" value="Varify OTP">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>