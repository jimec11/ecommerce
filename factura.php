<?php
    $total=$_REQUEST['total']??'';
    include_once "stripe/init.php";
    \Stripe\Stripe::setApiKey("sk_test_51JcwmwCsGwtG5E5PoUfzDNrsNK8f4BZiABAioHEcmIjjNsCQhQK3czd0LHIVDKX8i5W52q7NZdYpVbBGTGqHB2A100eFHbzVQ2");
    $toke=$_POST['stripeToken'];
    $charge=\Stripe\Charge::create([
        'amount'=>$total,
        'currency'=>'usd',
        'description'=>'Pago de MyEcommerce',
        'source'=>$toke
    ]);
    if($charge['captured']){
        $queryVenta="INSERT INTO ventas 
        (idCli, idPago, fecha) values
        ('".$_SESSION['idCliente']."','".$charge['id']."', now());
        ";
        $resVenta=mysqli_query($con,$queryVenta);
        $id=mysqli_insert_id($con);
        if($resVenta){
            echo "La venta fue exitosa con el id=".$id;
        }
    }
?>