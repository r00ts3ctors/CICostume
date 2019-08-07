<div class="col-xl-12">
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Form Pendaftaran Member</h5>
        <p class="mb-25">Untuk menambahkan data member silahkan di pastikan referal member tersebut, dan jika tidak ada referal maka sistem akan ambil alih</p>
        <div class="row">
            <div class="col-sm">
              <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-md-4">

                      <input type="text" class="form-control mt-15" name="idMember" id="idMember" placeholder="IDMember" value="<?php echo $idMember; ?>">
                      <small>MemberID <?php echo form_error('idMember') ?></small>


                      <input type="text" class="form-control mt-15" name="idReferal" id="idReferal"  value="<?php echo $idReferal; ?>" placeholder="IDReferal">
                      <small>ReferalID  <?php echo form_error('idReferal') ?></small>

                      <input type="text" class="form-control mt-15" name="nama" id="nama"  value="<?php echo $nama; ?>" placeholder="Nama">
                      <small>Nama Lengkap  <?php echo form_error('nama') ?></small>

                      </div>

                    <div class="col-md-4">

                      <input type="text" class="form-control mt-15" name="panggilan" id="panggilan"  value="<?php echo $panggilan; ?>"   placeholder="Nama Panggilan">
                      <small>Panggilan <?php echo form_error('panggilan') ?></small>



                      <input type="text" class="form-control mt-15" name="hp" id="hp" value="<?php echo $hp; ?>"  placeholder="No Telepon">
                      <small>No.Telepon <?php echo form_error('hp') ?></small>

                      <input type="text" class="form-control mt-15" name="email" id="email"  value="<?php echo $email; ?>"  placeholder="eMail">
                      <small>Email <?php echo form_error('email') ?></small>
                    </div>

                    <div class="col-md-4">

                      <input type="text" class="form-control mt-15" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" >
                      <small>Username <?php echo form_error('username') ?></small>
                      <hr />
                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                      <a href="<?php echo site_url('admin/home') ?>" class="btn btn-default">Cancel</a>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>
