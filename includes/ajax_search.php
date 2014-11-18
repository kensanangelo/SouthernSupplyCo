<?php

include 'functions.php';

$the_query = filter_var( $_POST['query'], FILTER_SANITIZE_STRING );

$result_array = ssc_query($the_query, 'search');


header('Content-Type: application/json');
echo json_encode($result_array);

