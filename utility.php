<?php
function redirection_to_action($new_value)
{
    header("Location:$new_value");
    exit;
}
