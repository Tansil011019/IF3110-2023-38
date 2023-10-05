<?php

define('ITEMS_PER_PAGE_DESKTOP', 12);
define('ITEMS_PER_PAGE_TABLET', 8);
define('ITEMS_PER_PAGE_PHONE', 4);

//DataBase
define('DB_HOST', 'localhost');
define('DB_NAME', $_ENV['POSTGRES_DB']);
define('DB_USER',$_ENV['POSTGRES_USER']);
define('DB_PASSWORD', $_ENV['POSTGRES_PASSWORD']);
