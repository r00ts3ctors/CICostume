<div class="col-xl-12">
              <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Regular Table</h5>
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo site_url('katagori/index'); ?>" class="form-inline" method="get">
                <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                <?php
                if ($q <> '')
                {
                  ?>
                  <a href="<?php echo site_url('katagori'); ?>" class="btn btn-default">Reset</a>
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
		<th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody><?php
                                      foreach ($katagori_data as $katagori)
                                      {
                                          ?>

			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $katagori->nama ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('katagori/read/'.$katagori->id),'Read');
				echo ' | ';
				echo anchor(site_url('katagori/update/'.$katagori->id),'Update');
				echo ' | ';
				echo anchor(site_url('katagori/delete/'.$katagori->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
                          <div class="col-md-6 text-right">

                            <nav class="pagination-wrap d-inline-block" aria-label="Page navigation example">
                                <?php echo $pagination ?>
                            </nav>


                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </section>
