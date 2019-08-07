<?php

$string = "<div class=\"col-xl-12\">
              <section class=\"hk-sec-wrapper\">
                  <?php echo anchor(site_url('".$c_url."/create'),'Create', 'class=\"btn btn-primary\"'); ?>
                <h5 class=\"hk-sec-title\">".ucfirst($table_name)." LIST</h5>
                <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                <form action=\"<?php echo site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                <div class=\"input-group\">
                <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?php echo \$q; ?>\">
                <span class=\"input-group-btn\">
                <?php
                if (\$q <> '')
                {
                  ?>
                  <a href=\"<?php echo site_url('$c_url'); ?>\" class=\"btn btn-default\">Reset</a>
                  <?php
                }
                ?>
                <button class=\"btn btn-primary\" type=\"submit\">Search</button>
                </span>
                </div>
                </form>

                  <div class=\"row\">
                      <div class=\"col-sm\">
                          <div class=\"table-wrap\">
                              <div class=\"table-responsive\">
                                  <table class=\"table mb-0\">
                                      <thead>
                                          <th>No</th>";
                          foreach ($non_pk as $row) {
                              $string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
                          }
                          $string .= "\n\t\t<th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>";

                          $string .= "<?php
                                      foreach ($" . $c_url . "_data as \$$c_url)
                                      {
                                          ?>
                                        ";

                          $string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
                          foreach ($non_pk as $row) {
                              $string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
                          }


                          $string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
                                  . "\n\t\t\t\t<?php "
                                  . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'Read'); "
                                  . "\n\t\t\t\techo ' | '; "
                                  . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'Update'); "
                                  . "\n\t\t\t\techo ' | '; "
                                  . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
                                  . "\n\t\t\t\t?>"
                                  . "\n\t\t\t</td>";

                          $string .=  "\n\t\t</tr>
                                          <?php
                                      }
                                      ?>
                                  </tbody>


                              </table>
                          </div>
                      </div>
                      <div class=\"row\">
                          <div class=\"col-md-6\">
                              <a href=\"#\" class=\"btn btn-primary\">Total Record : <?php echo \$total_rows ?></a>";
              if ($export_excel == '1') {
                  $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
              }
              if ($export_word == '1') {
                  $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
              }
              if ($export_pdf == '1') {
                  $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
              }
              $string .= "\n\t    </div>

                          <?php echo \$pagination ?>

                      </div>
                  </div>
              </div>
              </div>
          </section>";

$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
