<?php require_once 'app/views/ui/profileCustomer.php';?>

<div class="main-container">
    <div class="head-container">
        Customer List
    </div>
    <div class="line-container"></div>
    <div class="list-profile-customer">
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo profileCustomer($i,"Nama User","emailemailemail@gmail.com");
            }
        ?>
    </div>
</div>