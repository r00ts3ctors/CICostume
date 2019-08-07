<div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Coba <?php echo $button ?></h5>
                <p class="mb-25">

                </p>
                <form action="<?php echo $action; ?>" method="post"><div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-md-4">
	    <div class="form-group">
                                        <label for="varchar">Namacoba <?php echo form_error('namacoba') ?></label>
                                        <input type="text" class="form-control" name="namacoba" id="namacoba" placeholder="Namacoba" value="<?php echo $namacoba; ?>" />
                                    </div>
	    <div class="form-group">
                                        <label for="varchar">Tanggalcoba <?php echo form_error('tanggalcoba') ?></label>
                                        <input type="text" class="form-control" name="tanggalcoba" id="tanggalcoba" placeholder="Tanggalcoba" value="<?php echo $tanggalcoba; ?>" />
                                    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('coba') ?>" class="btn btn-default">Cancel</a>
	</form>



                            </div>

                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </section>