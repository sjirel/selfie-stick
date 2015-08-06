<?php
/*
	=================================================
	Selfie Stick - Page Sidebar Template
	=================================================
*/ 
?>
<aside id="sidebar" class="col">
    <?php
    if (is_active_sidebar('page-sidebar')) :
        dynamic_sidebar('page-sidebar');
    endif;
    ?>
</aside>


