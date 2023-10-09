<?php
    require_once 'app/models/ScheduleModel.php';

    $page = isset($_GET['page']) ? $_GET['page'] : '';
    $query['page'] = $page;

    $ScheduleModel = new ScheduleModel();

    $schedules = $ScheduleModel->getAllSchedule($query);
    $movieCount = $ScheduleModel->getAllScheduleCount()['count'];
?>

<div class="container-grid-card-movies">
    <?php foreach ($schedules as $datum) : ?>
        <?php require 'app/views/ui/bookinCard.php'; ?>
    <?php endforeach; ?>
</div>