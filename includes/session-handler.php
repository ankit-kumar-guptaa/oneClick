<?php
/**
 * Session Handler - Prevents multiple session_start() calls
 * This file should be included instead of calling session_start() directly
 */

function safe_session_start() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Start session safely if this file is included
safe_session_start();
?>