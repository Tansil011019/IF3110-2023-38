<?php

function BookinDropdown($name, $data, $placeHolder = "", $dropdownBtnClass = '') {
    $selectedValue = isset($_GET['param']) ? $_GET['param'] : null;

    echo '<select name="' . $name . '" class="dropdown-btn-' . $dropdownBtnClass . '">';
    echo '<option value="">' . $placeHolder . '</option>';

    foreach ($data as $datum) {
        $datumName = $datum[$name];
        $selected = ($selectedValue !== null && $selectedValue == $datumName) ? 'selected' : '';
        echo '<option value="' . $datumName . '" ' . $selected . ' class="selected-content-dropdown">' . $datumName . '</option>';
    }

    echo '</select>';
}

?>