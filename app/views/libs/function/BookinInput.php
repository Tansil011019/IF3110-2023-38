<?php

function BookinInput($props) {
    $type = isset($props['type']) ? $props['type'] : 'text';
    $name = isset($props['name']) ? $props['name'] : $props['type'];
    $innerClassName = isset($props['innerStyles']) ? $props['innerStyles'] : '';
    $outerClassName = isset($props['outerStyles']) ? $props['outerStyles'] : '';
    $placeHolder = isset($props['placeHolder']) ? $props['placeHolder'] : '';
    $required = isset($props['required']) ? 'required' : '';

    if($type == 'search-bar'){
        return "
        <div class=\"search-bar-container\">
            <input type=\"text\" class=\"search-bar\" placeholder=\"$placeHolder\">
        </div>
        ";
    } else {
        $typeInputStyleClass = 'text-input';
    
        if ($type == 'email') {
            $typeInputStyleClass = 'email-input';
        }else if ($type == 'password') {
            $typeInputStyleClass = 'password-input';
        }
    
        $combinedOuterClass = 'outer-input-class' . $outerClassName;
        $combinedInnerClass = $typeInputStyleClass . $innerClassName;
    
        $inputField = "
            <input type=\"$type\" class=\"$combinedInnerClass\" name=\"$name\" placeholder=\"$placeHolder\">
        ";
    
        if ($type == 'password') {
            $inputField = "
                <div class=\"password-input-container\">
                    <input type=\"$type\" class=\"$combinedInnerClass\" name=\"$name\" placeholder=\"$placeHolder\" $required>
                    <button type=\"button\" onclick=\"togglePasswordVisibility(this)\" class=\"password-toogle-button\">
                        <img src=\"/public/icons/bookin-eye-open-icon.svg\" alt=\"open-eye-icon\">
                    </button>
                </div>
            ";
        }
    
        return "
            <div class=\"$combinedOuterClass\" name=\"$name\"-outer>
               $inputField
            </div>
        ";  
    }

}

?>

