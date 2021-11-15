<?php
    include_once "stripe-php/init.php";
    
    \Stripe\Stripe::setApiKey("sk_test_JaTXHOFLk3lllnj1PnpahfxR00NLGmUe8M");
    $token=$_POST['stripeToken'];

    $charge=\Stripe\Charge::create([
        'amount'=>"100.00",
        'currency'=>'usd',
        'description'=>'Pago a ecommerce',
        'source'=>$token
    ]);
    echo "<pre>";
    var_dump($charge);
    echo "</pre>";
?>