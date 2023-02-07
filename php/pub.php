                   <?php

                    $today = date("Y-m-d");

                    $publish_date = date('F j, Y', strtotime($today));

                    echo "$publish_date";
