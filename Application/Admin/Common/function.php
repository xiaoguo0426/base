<?php
function is_parent_menu($parent_id)
{
    if (intval($parent_id) !== 0) {
        return "&emsp;--";
    }
}
