<?php
error_reporting(E_ALL);
session_start();
include("../class.form.php");

if(isset($_POST["cmd"]) && $_POST["cmd"] == "submit") {
	$form = new form("textbox_validation");
	if($form->validate())
		$msg = "Congratulations! The information you enter passed the form's validation.";
	else
		$msg = "Oops! The information you entered did not pass the form's validation.  Please review the following error message and re-try - " . $form->errorMsg;

	header("Location: textbox-validation.php?errorMsg=" . urlencode($msg));
	exit();
}

if(!isset($_GET["cmd"]) && !isset($_POST["cmd"])) {
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<title>PHP Form Builder Class | Examples | Textbox Validation</title>
			<link href="../style.css" rel="stylesheet" type="text/css"/>
			<link href="style.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
			<div id="pfbc_links"><a href="http://code.google.com/p/php-form-builder-class/">Homepage - Google Code Project Hosting</a> | <a href="http://groups.google.com/group/php-form-builder-class/">Development Community - Google Groups</a> | <a href="http://php-form-builder-class.googlecode.com/files/formbuilder.zip">Download Version <?php echo(file_get_contents('../version'));?></a></div>
			<div id="pfbc_banner">
				<h2><a href="../index.php">PHP Form Builder Class</a> / <a href="index.php">Examples</a> / Textbox Validation</h2>
				<h5><span>Version: <?php echo(file_get_contents('../version'));?></span><span style="padding-left: 10px;">Released: <?php echo(file_get_contents('../release'));?></span></h5>
			</div>

			<div id="pfbc_content">
				<p><b>Textbox Validation</b> - There are several element attributes that can be used to filter/validate textboxes.  Two of these attributes - integer and alphanumeric - can be
				seen below.</p>

				<?php
				$form = new form("textbox_validation");
				$form->setAttributes(array(
					"includesPath" => "../includes",
					"width" => 400
				));

				if(!empty($_GET["errorMsg"]))
					$form->errorMsg = "<b>Error:</b> " . filter_var(stripslashes($_GET["errorMsg"]) , FILTER_SANITIZE_SPECIAL_CHARS);

				$form->addHidden("cmd", "submit");
				$form->addTextbox("Textbox w/integer Attribute:", "Integer", "", array("integer" => 1));
				$form->addTextbox("Textbox w/alphanumeric Attribute:", "AlphaNumeric", "", array("alphanumeric" => 1));
				$form->addButton();
				$form->render();

echo '<pre>', highlight_string('<?php
$form = new form("textbox_validation");
$form->setAttributes(array(
	"includesPath" => "../includes",
	"width" => 400
));

if(!empty($_GET["errorMsg"]))
	$form->errorMsg = "<b>Error:</b> " . filter_var(stripslashes($_GET["errorMsg"]) , FILTER_SANITIZE_SPECIAL_CHARS);

$form->addHidden("cmd", "submit");
$form->addTextbox("Textbox w/integer Attribute:", "Integer", "", array("integer" => 1));
$form->addTextbox("Textbox w/alphanumeric Attribute:", "AlphaNumeric", "", array("alphanumeric" => 1));
$form->addButton();
$form->render();
?>', true), '</pre>';

				?>
			</div>	
		</body>
	</html>
	<?php
}
?>

