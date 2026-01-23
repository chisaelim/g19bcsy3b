<?php
require_once('./init/init.php');
include './includes/header.inc.php';
include './includes/navbar.inc.php';
$user = loggedInUser();
// unset($_SESSION['user_id']); // logout
$avialable_pages = ['login', 'register', 'dashboard'];
$logged_in_pages = ['dashboard'];
$non_logged_in_pages = ['login', 'register'];
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page']; // login
}
if (in_array($page, $logged_in_pages) && empty($user)) {
    header('Location: ./?page=login');
}
if (in_array($page, $non_logged_in_pages) && !empty($user)) {
    header('Location: ./?page=dashboard');
}
if (in_array($page, $avialable_pages)) {
    include './pages/' . $page . '.php';
} else {
    // header('Location: ./?page=dashboard');
    header('Location: ./?page=login');
}
?>
<?php
include './includes/footer.inc.php'
?>