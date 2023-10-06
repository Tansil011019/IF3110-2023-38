        <?php
        $currentUrl = $_SERVER['REQUEST_URI'];

        $excludedUrls = ['/login', '/register'];

        if (!in_array($currentUrl, $excludedUrls)) {
            echo '<footer></footer>';
        }
        ?>
        <script src="/public/js/password-input-eye-button.js"></script>
        <script src="/public/js/dropdown-home-filter.js"></script>
    </body>
</html>