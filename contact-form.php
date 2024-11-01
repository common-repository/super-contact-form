<?php
$msgerror = false;
$message = "";
if($_GET['mailsent'] == 1)
{
  $required = array();
  if(trim($_POST[scfname]) == "") { array_push($required,"Name"); }
  if(trim($_POST[scfemail]) == "") { array_push($required,"Email"); }
  if(trim($_POST[scfsubject]) == "") { array_push($required,"Subject"); }
  if(trim($_POST[scfmessage]) == "") { array_push($required,"Message"); }
  if(strlen(trim($_POST[scfmessage])) < 25) { $msgerror = true; }
  if(count($required) > 0)
  {
    $j = 0;
    $fields = "";
    for($i = 0;$i < count($required); $i++)
    {
      $j++;
      if(trim($required[$j]) != "") {$fields = $fields.$required[$i].", ";} else {$fields = $fields.$required[$i];}
    }
    $message = '<div class="error_left"></div><div class="error_center">Following fields are missing: '.$fields.'</div><div class="error_right"></div><div class="clear"></div>';
  }
  else if($msgerror == true) {
    $message = '<div class="error_left"></div><div class="error_center">Message too short, try again</div><div class="error_right"></div><div class="clear"></div>';
  }
  else {
    $recipient = get_option('scf_email_option');
    $from = $_POST[scfname]."[".$_POST[scfemail]."]";
    mail($recipient, $_POST[scfsubject], $_POST[scfmessage], $from);
    $message = '<div class="success_left"></div><div class="success_center">Message sent successfully</div><div class="success_right"></div><div class="clear"></div>';
  }
}
?>
<div id="contact-form">
<form name="contact-form" method="post" action="./?mailsent=1">
<div id="messagebox"><?php echo $message; ?></div>
<label>Name: </label><br />
<input name="scfname" id="scfname" size="40" value="<?php echo $_POST[scfname]; ?>" /><br /><br />
<label>Email: </label><br />
<input name="scfemail" id="scfemail" size="40" value="<?php echo $_POST[scfemail]; ?>" /><br /><br />
<label>Subject: </label><br />
<input name="scfsubject" id="scfsubject" size="40" value="<?php echo $_POST[scfsubject]; ?>" /><br /><br />
<label>Message: </label><br />
<textarea rows="7" cols="35" name="scfmessage" id="scfmessage"><?php echo $_POST[scfmessage]; ?></textarea><br /><br />
<input type="submit" name="scfsubmit" id="scfsubmit" value=" Send Message " />
</form>
</div>