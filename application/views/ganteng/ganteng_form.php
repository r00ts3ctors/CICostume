<div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Ganteng <?php echo $button ?></h5>
                <p class="mb-25">

                </p>
                <form action="<?php echo $action; ?>" method="post"><div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-md-4">
	    <div class="form-group">
                                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                    </div>
	    <div class="form-group">
                                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                                    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ganteng') ?>" class="btn btn-default">Cancel</a>
	</form>



                            </div>

                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </section>