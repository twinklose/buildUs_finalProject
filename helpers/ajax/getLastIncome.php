<?php

require_once(__DIR__.'/../../config/config.php');
require_once(__DIR__.'/../../models/Income.php');

// Variables

$created = $_SESSION['id'];
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$invoice = Income::getLastIncome($created, $id);

echo json_encode($invoice);

