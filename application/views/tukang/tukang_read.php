    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Tukang Detail </h5>
            <p class="mb-40">Tampilan Detail Silahkan disesuaikan</p>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table mb-0">
                            <thead>
	
                                <tr>
                                <td>Nama</td>
                                <td><?php echo $nama; ?></td>
                                </tr>
	
                                <tr>
                                <td>Alamat</td>
                                <td><?php echo $alamat; ?></td>
                                </tr>
	
                                <tr>
                                <td>Kecamatan</td>
                                <td><?php echo $kecamatan; ?></td>
                                </tr>
	    </thead>
                    <tbody>
                    <tr>
                    <td>
                    </td>
                    <td>
                    <a href="<?php echo site_url('tukang') ?>" class="btn btn-warning">Cancel</a>
                    </td>
                    </tr>
	 </tbody></table>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>