<?php
// includes/auth.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Checks if the user is logged in. If not, redirects to login.php.
 */
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /PTCARE WEBSITE/login.php");
        exit;
    }
}

/**
 * Checks if the user has a specific role.
 */
function requireRole($role) {
    requireLogin();
    if ($_SESSION['role'] !== $role) {
        if ($_SESSION['role'] === 'admin') {
            header("Location: /PTCARE WEBSITE/admin/dashboard.php");
        } else {
            header("Location: /PTCARE WEBSITE/staff/dashboard.php");
        }
        exit;
    }
}
?>
