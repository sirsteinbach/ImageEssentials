<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <!--HOSTED-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--FOUNDATION-->
	<script src="js/vendor/modernizr.js"></script>      
    <link rel="stylesheet" href="css/foundation.css" type="text/css">
    <!--CUSTOM--> 
    <script src="js/custom/jquery.maskedinput.min.js"></script>  
    <link rel="stylesheet" href="css/overlay.css" type="text/css">
    <script>
	$(function($){
		$('#datepicker').mask("99/99/9999",{placeholder:'mm-dd-yy'});
		$('#PhoneNumber').mask("(999) 999-9999");
		$('#datepicker').datepicker({
			dateFormat:'MM d, yy',
			changeMonth:true,
			changeYear:true,
			minDate:'0',
			maxDate:'+2y'
		});
	});
    </script>
</head>
<body>

<!--HEADER-->
<?php include('header.php'); ?>
			
<!--CONTACT ROW -->
<div class="row">
  <div class="medium-12 columns MakeupClr4 pad-sm">
	<img src="img/transparent.gif" />
  </div>
</div>

<div class="row">
  <div class="medium-4 columns MakeupClr4 hide-for-small">
	<p>Picture</p>
  </div>
  <div class="medium-8 columns MakeupClr4">
	<div class="panel radius">
 
    <form>
      <fieldset>
        <legend>Contact Me</legend>
        
        <div class="row">
          <div class="medium-12 columns">
            <div class="row collapse prefix-round">                  
              <div class="small-3 medium-2 columns">
                <a href="#/" class="button prefix"><i class="fa fa-user fa-lg"></i></a>
              </div>
              <div class="small-9 medium-10 columns">
                <input type="text" name="FullName" placeholder="Full Name">
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="medium-12 columns">
            <div class="row collapse prefix-round">                  
              <div class="small-3 medium-2 columns">
                <a href="#/" class="button prefix"><i class="fa fa-phone fa-lg"></i></a>
              </div>
              <div class="small-9 medium-10 columns">
                <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number" required pattern="^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$">
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="medium-12 columns">
            <div class="row collapse prefix-round">                  
              <div class="small-3 medium-2 columns">
                <a href="#/" class="button prefix"><i class="fa fa-envelope fa-lg"></i></a>
              </div>
              <div class="small-9 medium-10 columns">
                <input type="email" name="EmailAddress" placeholder="Email Address" required>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="medium-12 columns">
            <div class="row collapse prefix-round">                  
              <div class="small-3 medium-2 columns">
                <a href="#/" class="button prefix"><i class="fa fa-calendar fa-lg"></i></a>
              </div>
              <div class="small-9 medium-10 columns">
                <input type="text" name="EventDate" id="datepicker" placeholder="Select Date" required>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="medium-12 columns">
            <div class="row collapse prefix-round">                  
              <div class="small-3 medium-2 columns">
                <a href="#/" class="button prefix"><i class="fa fa-comment fa-lg"></i></a>
              </div>
              <div class="small-9 medium-10 columns">
                <textarea name="Comment"></textarea>
              </div>
            </div>
          </div>
        </div>
                
        
        
      </fieldset>
      
      <div class="row">
        <div class="small-12 medium-10 columns text-right">
          <button type="submit" class="button success tiny radius">SEND &nbsp;<i class="fa fa-paper-plane fa-lg"></i></button>
        </div>
      </div>
      
    </form>

    </div>
  </div>
</div>
  
  <!--FOOTER-->
  <?php include('footer.php'); ?>
 
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
  //Initialize Foundation
  jQuery(document).foundation();
  </script>

</body>
</html>