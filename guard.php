<?php
if (isset($_SESSION['user'])) {
    header ('location:to_do_list.php');
}