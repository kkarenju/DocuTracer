<?php
    // Initial page num setup
    if ($page == 0){$page = 1;}
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$limit);
    $LastPagem1 = $lastpage - 1;

    $paginate = '';
    if($lastpage > 1)
    {
        $paginate .= "<div class='paginate'>";
        // Previous
        if ($page > 1){
        $paginate.= "<a href='$targetpage?page=$prev' class=\"page-next-previous\">previous</a>";
        }else{
            $paginate.= "<span class='disabled-next-previous'>previous</span>"; }
                                                                            
            // Pages
            if ($lastpage < 7 + ($stages * 2)) // Not enough pages to breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.= "<span class='current'>$counter</span>";
                    }else{
                        $paginate.= "<a href='$targetpage?page=$counter' class='available'>$counter</a>";
                    }
                }
            }
            else if($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
            {
                // Beginning only hide later pages
                if($page < 1 + ($stages * 2))
                {
                    for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }
                        else{
                            $paginate.= "<a href='$targetpage?page=$counter' class='available'>$counter</a>";
                        }
                    }
                        
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage?page=$LastPagem1' class='available'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage?page=$lastpage' class='available'>$lastpage</a>";
                }
                // Middle hide some front and some back
                else if($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
                {
                    $paginate.= "<a href='$targetpage?page=1' class='available'>1</a>";
                    $paginate.= "<a href='$targetpage?page=2' class='available'>2</a>";
                    $paginate.= "...";
                    for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }
                        else{
                            $paginate.= "<a href='$targetpage?page=$counter' class='available'>$counter</a>";
                        }
                    }
                    $paginate.= "...";
                    $paginate.= "<a href='$targetpage?page=$LastPagem1' class='available'>$LastPagem1</a>";
                    $paginate.= "<a href='$targetpage?page=$lastpage' class='available'>$lastpage</a>";
                }
                // End only hide early pages
                else
                {
                    $paginate.= "<a href='$targetpage?page=1' class='available'>1</a>";
                    $paginate.= "<a href='$targetpage?page=2' class='available'>2</a>";
                    $paginate.= "...";
                    for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page){
                            $paginate.= "<span class='current'>$counter</span>";
                        }else{
                            $paginate.= "<a href='$targetpage?page=$counter' class='available'>$counter</a>";
                        }
                    }
                }
            }

            // Next
            if ($page < $counter - 1){
                $paginate.= "<a href='$targetpage?page=$next' class=\"page-next-previous\">next</a>";
            }else
            {
                $paginate.= "<span class='disabled-next-previous'>next</span>";
            }

            $paginate.= "</div>";

        }
                                                                            
        // pagination
        echo $paginate;
?>
