<div class = "row mt-1">
<?php
    include_once "admin/db_ecommerce.php";
    $con =mysqli_connect ($host,$user,$pass,$db);
    $where = "where 1=1";
    $nombre=mysqli_real_escape_string($con, $_REQUEST['nombre']??'');
    if(empty($nombre)==false){
        $where="and nombre like '%".$nombre."%' ";
    }
    $queryCuenta="SELECT count(*) as cuenta from productos $where;";
    $resCuenta=mysqli_query($con,$queryCuenta);
    $rowCuenta=mysqli_fetch_assoc($resCuenta);
    $totalRegistros = $rowCuenta['cuenta'];

    $elementosPorPagina=6;
    
    $totalPaginas=ceil($totalRegistros/$elementosPorPagina);
    
    $paginaSel=$_REQUEST['pagina']??false;

    if($paginaSel==false){
        $inicioLimite=0;
        $paginaSel=1;
    }else{
        $inicioLimite=($paginaSel-1)* $elementosPorPagina; 
    }
    $limite=" limit $inicioLimite,$elementosPorPagina ";
    
    $query="SELECT p.id, p.nombre, p.precio, p.existencia, f.web_path 
    from 
    productos as p
    inner join productos_files as pf on pf.producto_id = p.id
    inner join files as f on f.id = pf.file_id 
    $where
    group by p.id 
    $limite
    ";

    $res=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class = "card border-primary">
                <img class="card-img-top img-thumbnail" src="<?php echo $row['web_path'] ?>" alt="">
                <div class="card-body">
                    <h2 class="card-title"> <strong> <?php echo $row['nombre'] ?> </strong> </h2>
                    <p class="card-text"><strong>Precio:</strong> <?php echo $row['precio'] ?> </p>
                    <p class="card-text"><strong>Existencia:</strong> <?php echo $row['existencia'] ?> </p>
                    <a href="index.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>" class="btn btn-primary"> Ver </a>
                </div>
            </div>
        </div>
    <?php
    }
?>
</div>
<?php
if($totalPaginas>0){
?>
<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php
        if($paginaSel!=1){
        ?>
    <li class="page-item">
        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
        </a>
    </li>
    <?php
    }
    ?>

    <?php
    for($i=1;$i==$totalPaginas;$i++){
    ?>
    <li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?> ">
        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?> "> <?php echo $i; ?> </a></li>
    <?php
    }
    ?>
    <!-- <li class="page-item"><a class="page-link" href="#"></a></li> -->

    <?php
        if($paginaSel!=$totalPaginas){
    ?>
    <li class="page-item">
        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
        </a>
    </li>
    <?php
    }
    ?>
    </ul>
</nav>
<?php
}
?>