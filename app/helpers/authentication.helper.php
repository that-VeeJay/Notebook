<?php
function flashMessage($type, $message = null)
{
    if (!isset($_SESSION[$type])) {
        $_SESSION[$type] = [];
    }

    if ($message !== null) {
        $_SESSION[$type][] = $message;
    } else {
        if (!empty($_SESSION[$type])) {
            foreach ($_SESSION[$type] as $msg) {
                echo '<div class="' . htmlspecialchars($type) . '-message">';
                echo '<i class="fa-solid fa-' . ($type === 'error' ? 'circle-exclamation' : 'check') . '"></i>';
                echo '<p class="' . htmlspecialchars($type) . '">' . htmlspecialchars($msg) . '</p>';
                echo '</div>';
            }
            unset($_SESSION[$type]);
        }
    }
}
