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
        <h2 style="margin-top:0px">Member <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">IdMember <?php echo form_error('idMember') ?></label>
            <input type="text" class="form-control" name="idMember" id="idMember" placeholder="IdMember" value="<?php echo $idMember; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">IdReferal <?php echo form_error('idReferal') ?></label>
            <input type="text" class="form-control" name="idReferal" id="idReferal" placeholder="IdReferal" value="<?php echo $idReferal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Panggilan <?php echo form_error('panggilan') ?></label>
            <input type="text" class="form-control" name="panggilan" id="panggilan" placeholder="Panggilan" value="<?php echo $panggilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdDetail <?php echo form_error('idDetail') ?></label>
            <input type="text" class="form-control" name="idDetail" id="idDetail" placeholder="IdDetail" value="<?php echo $idDetail; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdSaldo <?php echo form_error('idSaldo') ?></label>
            <input type="text" class="form-control" name="idSaldo" id="idSaldo" placeholder="IdSaldo" value="<?php echo $idSaldo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pin <?php echo form_error('pin') ?></label>
            <input type="text" class="form-control" name="pin" id="pin" placeholder="Pin" value="<?php echo $pin; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>