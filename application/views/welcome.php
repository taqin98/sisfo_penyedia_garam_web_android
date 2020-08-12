<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>
</head>
<body>
<h1>Login User</h1>
<?php
	if($this->session->flashdata('sukses')) {
           echo $this->session->flashdata('sukses');
    }
?>
<form method="POST" action="<?php echo base_url(); ?>index.php/users/login">
<input type="text" name="username">
<input type="password" name="password">
<input type="submit" value="login" name="submit">
</body>
</html>