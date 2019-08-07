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
        <h2 style="margin-top:0px">Member List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('member/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('member/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('member'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdMember</th>
		<th>IdReferal</th>
		<th>Nama</th>
		<th>Panggilan</th>
		<th>Hp</th>
		<th>Email</th>
		<th>IdDetail</th>
		<th>IdSaldo</th>
		<th>Username</th>
		<th>Password</th>
		<th>Pin</th>
		<th>Action</th>
            </tr><?php
            foreach ($member_data as $member)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $member->idMember ?></td>
			<td><?php echo $member->idReferal ?></td>
			<td><?php echo $member->nama ?></td>
			<td><?php echo $member->panggilan ?></td>
			<td><?php echo $member->hp ?></td>
			<td><?php echo $member->email ?></td>
			<td><?php echo $member->idDetail ?></td>
			<td><?php echo $member->idSaldo ?></td>
			<td><?php echo $member->username ?></td>
			<td><?php echo $member->password ?></td>
			<td><?php echo $member->pin ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('member/read/'.$member->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('member/update/'.$member->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('member/delete/'.$member->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>