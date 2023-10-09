<?php require_once 'app/views/components/customerList/profileCustomer.php'; ?>

<div class="main-container">
    <div class="head-container">
        Customer List
    </div>
    <div class="line-container"></div>
    <div class="list-profile-customer">
        <?php
        $i = 1;
        foreach ($data['customer'] as $datum) {
            echo profileCustomer($i, $datum['name'], $datum['email']);
            $i++;
        }
        ?>
    </div>
</div>

<script src="/public/js/profile-customer.js"></script>