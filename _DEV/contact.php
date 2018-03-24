<!DOCTYPE html>
<html class="no-js" lang="en" xml:lang="en">
  <head>
    <meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#22659C">
		<meta name="author" content="Stephen Steinbach">
		<meta name="webBuild" content="Foundation5.5">
    <!--SELF-->
    <link rel="icon" href="_img/universal/favicon.ico">
    <link rel="stylesheet" href="_css/f5/zurbed.css">
    <!--PAGE SPECIFIC-->
    <title>Contact :: Image Essentials</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/blitzer/jquery-ui.css">
  </head>
<body>

  <!--HEADER-->
  <?php include("header.php"); ?>

  <!--CONTACT ROW -->
  <div class="row">
    <div class="medium-12 columns MakeupClr4 pad-sm">&nbsp;</div>
  </div>

  <div class="row MakeupClr4">
    <div class="medium-4 columns show-for-small">
      <span class="rounded"><img src="_img/contact/contact.jpg"></span>
      <div class="row">
        <div class="medium-12 columns MakeupClr4 pad-sm">&nbsp;</div>
      </div>
    </div>
    <div class="medium-4 columns hide-for-small">
  	<span class="rounded"><img src="_img/contact/map.jpg"></span>
    </div>
    <div class="medium-8 columns">
  	<div class="panel radius">
        <h5 class="panel-head bgPinkLt"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x PinkDk"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span> <?php if ($_POST['EmailAddress']<>""){echo "Thank You";} else {echo "Contact Me";} ?></h5>

  <?php
  if ($_POST['EmailAddress']<>'') {
  	//Create Email
  	$headers = "From: Image Essentials" . "\r\n" . "CC: ".$_POST['EmailAddress'];
      $ToEmail = "terrimfoster@gmail.com";
      $EmailSubject = "Contact Inquiry";
      $mailheader = "From: ".$_POST['EmailAddress']."\r\n";
      $mailheader .= "Reply-To: ".$_POST['EmailAddress']."\r\n";
      //$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
      $MESSAGE_BODY =
  	"Name: ".$_POST['FullName']."\r\nPhone: ".$_POST['PhoneNumber']."\r\nEmail: ".$_POST['EmailAddress']."\r\nLocation: ".$_POST['Location']."\r\nDate: ".$_POST['EventDate']."\r\n";
  	if ($_POST['Comment']<>''){$MESSAGE_BODY .= "Comment: ".$_POST['Comment']."\r\n";}
  	//Send Email
  	mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ('Failure');
  ?>
  <p>The following informaiton was sent and I will be contacting you shortly.</p>
  <ul>
    <li>Name: <strong><?php echo $_POST['FullName'] ?></strong></li>
    <li>Phone: <strong><?php echo $_POST['PhoneNumber'] ?></strong></li>
    <li>Email: <strong><?php echo $_POST['EmailAddress'] ?></strong></li>
    <li>Location: <strong><?php echo $_POST['Location'] ?></strong></li>
    <li>Date: <strong><?php echo $_POST['EventDate'] ?></strong></li>
    <?php if ($_POST['Comment']<>''){echo "<li>Comment: <strong>". $_POST['Comment'] ."</strong></li>" ;}?>
  </ul>
  <?php
  } else { 
  ?>

  <form id="contact" method="POST" action="contact.php" data-abide>
    <!--Name-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-user fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <input type="text" name="FullName" placeholder="Full Name" required pattern=".{3,}"><small class="error">Your name is required!</small>
        </div>
      </div>
    </div>
    <!--Phone-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-phone fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <input type="tel" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number" required pattern="^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$"><small class="error">A phone number is required!</small>
        </div>
      </div>
    </div>
    <!--Email-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-envelope fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <input type="email" name="EmailAddress" placeholder="Email Address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><small class="error">An email address is required!</small>
        </div>
      </div>
    </div>
    <!--Location-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-map-marker fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <input type="text" name="Location" placeholder="Event Location" required pattern=".{5,}"><small class="error">A location for services is required!</small>
        </div>
      </div>
    </div>
    <!--Date-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-calendar fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <input type="text" name="EventDate" id="datepicker" placeholder="Select Date" readonly style="background-color:#fff;"><small class="error">Please select a date!</small>
        </div>
      </div>
    </div>
    <!--Comment-->
    <div class="medium-12 columns">
      <div class="row collapse">
        <div class="small-3 medium-2 columns">
          <span class="prefix rRound"><i class="fa fa-comment fa-lg"></i></span>
        </div>
        <div class="small-9 medium-10 columns">
          <textarea name="Comment" placeholder="Comments" class="autoExpand"></textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="medium-12 columns pad-md">&nbsp;</div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <button type="submit" class="button success tiny radius">SEND &nbsp;<i class="fa fa-paper-plane fa-lg"></i></button> <button type="reset" class="button tiny radius">RESET &nbsp;<i class="fa fa-refresh fa-lg"></i></button>
      </div>
      <div class="large-6 columns text-right">
        <small><i class="fa fa-exclamation-circle"></i> Information not distributed. Used solely for response.</small>
      </div>
    </div>
  </form>

  <?php } //end Form or Confirmation ?>

      </div>

      <div class="panel radius">
  	  <h5 class="panel-head bgPinkLt">
          <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x PinkDk"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span> Phone Contact</h5>
        <p>Uptown Studio @ (541)-507-1139<br>
        <small>2900 NW Vine Street, Grants Pass, Oregon 97526</small></p>
  	</div>

    </div>
  </div>

  <!--FOOTER-->
  <?php include("footer.php"); ?>

  <!--HOSTED-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
  <script>
  $(function($){
    $('#datepicker').mask("99/99/9999",{placeholder:'mm-dd-yy'});
    $('#PhoneNumber').mask("(999) 999-9999");
    $('#datepicker').datepicker({
      dateFormat:'MM d, yy',
      //changeMonth:true,
      //changeYear:true,
      minDate:'0',
      maxDate:'+2y'
    });
  });
  
  $(document).one('focus.textarea', '.autoExpand', function(){
    var savedValue = this.value;
    this.value = '';
    this.baseScrollHeight = this.scrollHeight;
    this.value = savedValue;
  })
  .on('input.textarea', '.autoExpand', function(){
    var minRows = this.getAttribute('data-min-rows')|0,
       rows;
    this.rows = minRows;
  console.log(this.scrollHeight , this.baseScrollHeight);
    rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 17);
    this.rows = minRows + rows;
  });
  </script>

  <!--SELF-->
  <script src="_js/f5/zurbed.js"></script>
  <script src="_js/f5/topbar.js"></script>
  <script src="_js/f5/equalizer.js"></script>
  <script src="_js/f5/abide.js"></script>
  <script src="_js/f5/maskInput.js"></script>
  <script>
  //Initialize Foundation
  jQuery(document).foundation();
  </script>

</body>
</html>