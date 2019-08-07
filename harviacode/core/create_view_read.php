<?php

$string = "    <div class=\"col-xl-12\">
        <section class=\"hk-sec-wrapper\">
            <h5 class=\"hk-sec-title\">".ucfirst($table_name)." Detail </h5>
            <p class=\"mb-40\">Tampilan Detail Silahkan disesuaikan</p>
            <div class=\"row\">
                <div class=\"col-sm\">
                    <div class=\"table-wrap\">
                        <div class=\"table-responsive\">
                            <table class=\"table mb-0\">
                            <thead>";
                            foreach ($non_pk as $row) {
                                $string .= "\n\t
                                <tr>
                                <td>".label($row["column_name"])."</td>
                                <td><?php echo $".$row["column_name"]."; ?></td>
                                </tr>";
                            }
$string .= "\n\t    </thead>
                    <tbody>
                    <tr>
                    <td>
                    </td>
                    <td>
                    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-warning\">Cancel</a>
                    </td>
                    </tr>";
$string .= "\n\t </tbody></table>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>";


$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>
