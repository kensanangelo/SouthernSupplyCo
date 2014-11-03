<?php
require_once('lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_GHVKQT64DdQAaDqPagJQjXsA",
  "publishable_key" => "pk_test_7u3S1b6vCyoZloGw6w7JuFKX"
);

Stripe::setApiKey($stripe['secret_key']);
?>