<?php
function logUserIn($username, $passwd)
{
    global $db;
    $query = $db->prepare(
        "SELECT * FROM tbl_users WHERE username = ? AND passwd = ?"
    );
    $query->bind_param('ss', $username, $passwd);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    }
    return false;
}

function loggedInUser()
{
    global $db;
    if (!isset($_SESSION['user_id'])) {
        return null;
    }
    $user_id = $_SESSION['user_id'];
    $query = $db->prepare(
        "SELECT * FROM tbl_users WHERE id = ?"
    );
    $query->bind_param('s', $user_id);
    $query->execute();
    $result = $query->get_result();
    if ($result->num_rows) {
        return $result->fetch_object();
    }
    return null;
}
