<html lang="en">
    <?php
        require_once('head.php');
    ?>
    <body>
        <?php
            require_once('nav.php');
            include('src/transactionModel.php');
        ?>
        <div class='container'>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Egresos <?php echo getMothText() ?></h5>
                            <p class="card-text">$ <?php echo number_format(sumTransaction(1, getMonth()), 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Ingresos <?php echo getMothText() ?></h5>
                            <p class="card-text">$ <?php echo  number_format(sumTransaction(0, getMonth()), 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Total <?php echo getMothText() ?></h5>
                            <p class="card-text">$ <?php echo number_format(total(getMonth()), 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>