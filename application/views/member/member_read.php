<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Member Read</h2>
        <table class="table">
	    <tr><td>IdMember</td><td><?php echo $idMember; ?></td></tr>
	    <tr><td>IdReferal</td><td><?php echo $idReferal; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Panggilan</td><td><?php echo $panggilan; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>IdDetail</td><td><?php echo $idDetail; ?></td></tr>
	    <tr><td>IdSaldo</td><td><?php echo $idSaldo; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Pin</td><td><?php echo $pin; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>