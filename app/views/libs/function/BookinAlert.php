<?php

function BookinAlert($message, $type = 'info')
{
    return '<script>alert' . ($type !== 'info' ? '("' . $message . '", "' . $type . '")' : '("' . $message . '")') . ';</script>';
}
