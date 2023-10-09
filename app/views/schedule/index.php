<div class="schedule-container">
    <div class="schedule-title">
        My Movie Order
    </div>
    <div class="schedule-data-container">
        <div class="schedule-container-bookin-data">
            <?php
            require_once 'app/views/components/schedule/scheduleMoviesData.php'
            ?>
        </div>
        <?php
        require_once 'app/views/ui/bookinPagination.php';
        ?>
    </div>
</div>

<script src="/public/js/schedule-pagination.js"></script>