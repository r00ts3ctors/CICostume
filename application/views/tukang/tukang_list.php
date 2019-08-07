<div class="col-xl-12">
              <section class="hk-sec-wrapper">
                  <?php echo anchor(site_url('tukang/create'),'Create', 'class="btn btn-primary"'); ?>
                <h5 class="hk-sec-title">Tukang LIST</h5>
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo site_url('tukang/index'); ?>" class="form-inline" method="get">
                <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                <?php
                if ($q <> '')
                {
                  ?>
                  <a href="<?php echo site_url('tukang'); ?>" class="btn btn-default">Reset</a>
                  <?php
                }
                ?>
                <button class="btn btn-primary" type="submit">Search</button>
                </span>
                </div>
                </form>

                  <div class="row">
                      <div class="col-sm">
                          <div class="table-wrap">
                              <div class="table-responsive">
                                  <table class="table mb-0">
                                      <thead>
                                          <th>No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Kecamatan</th>
		<th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody><?php
                                      foreach ($tukang_data as $tukang)
                                      {
                                          ?>
                                        
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tukang->nama ?></td>
			<td><?php echo $tukang->alamat ?></td>
			<td><?php echo $tukang->kecamatan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('tukang/read/'.$tukang->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('tukang/update/'.$tukang->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('tukang/delete/'.$tukang->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>


                              </table>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>

                          <?php echo $pagination ?>

                      </div>
                  </div>
              </div>
              </div>
          </section>