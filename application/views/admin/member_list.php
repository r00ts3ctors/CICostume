<div class="col-xl-12">
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">
      <div style="margin-top: 8px" id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>

    </h5>
    <div class="row float-right">
      <div class="input-group ">
        <form action="<?php echo site_url('admin/home/index'); ?>" class="form-inline" method="get">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
          <?php
          if ($q <> '')
          {
            ?>
            <a href="<?php echo site_url('admin/home'); ?>" class="btn btn-default">Reset</a>
            <?php
          }
          ?>
          <button class="btn btn-primary" type="submit">Search</button>
        </span>
      </form>
      </div>
</div>


      <div class="col-sm">
        <div class="table-wrap mb-30">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>IDMember</th>
                  <th>IDReferal</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($member_data as $member) { ?>
                  <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td>
                      <div class="badge badge-danger"><?php echo $member->idMember ?>
                      </div>

                    </td>
                    <td><?php echo $member->idReferal ?></td>
                    <td><?php echo $member->nama ?></td>
                    <td><?php echo $member->email ?></td>
                    <td style="text-align:center" width="200px">
                      <?php
                      echo anchor(site_url('admin/home/read/'.$member->id),'Read');
                      echo ' | ';
                      echo anchor(site_url('admin/home/update/'.$member->id),'Update');
                      echo ' | ';
                      echo anchor(site_url('admin/home/delete/'.$member->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                      ?>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
        <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?>
        </a>
        <div class="col-md-6 text-right">
          <?php echo $pagination ?>
        </div>
      </div>
    </div>
  </section>
</div>
