<?php
$string = "<div class=\"col-xl-12\">
            <section class=\"hk-sec-wrapper\">
                <h5 class=\"hk-sec-title\">".ucfirst($table_name)." <?php echo \$button ?></h5>
                <p class=\"mb-25\">

                </p>
                <form action=\"<?php echo \$action; ?>\" method=\"post\">";
$string .= "<div class=\"row\">
                    <div class=\"col-sm\">
                        <div class=\"row\">
                            <div class=\"col-md-4\">";


                            foreach ($non_pk as $row) {
                                if ($row["data_type"] == 'text')
                                {
                                $string .= "\n\t    <div class=\"form-group\">
                                        <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                                        <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
                                    </div>";
                                } else
                                {
                                $string .= "\n\t    <div class=\"form-group\">
                                        <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                                        <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
                                    </div>";
                                }
                            }
                            $string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
                            $string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
                            $string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
                            $string .= "\n\t</form>



                            </div>

                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </section>";




$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>
