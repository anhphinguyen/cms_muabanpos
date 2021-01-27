<?php

function construct()
{
    //    echo "DÙng chung, load đầu tiên";
    // load('lib', 'validation');
    // load('lib', 'email');
}

function indexAction(){
    // $user_data = get_user_by_id($_SESSION['id_account']);
    load_view('index');
}
