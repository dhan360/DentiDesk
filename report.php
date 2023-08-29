<html lang="en">
    <?php
        require_once('head.php');
    ?>
    <body>
        <!-- <script>
            jQuery(document).ready(function() {
                getTransactions();
            });
        </script> -->
        <?php
            require_once('nav.php');
            include('src/transactionModel.php');
        ?>
        <div class="container">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mes</label>
                <select class="form-select" id='month' onchange="getTransactions();">
                            <option selected value="0">Selecciona...</option>
                            <?php echo selectMonths(); ?>
                </select>
            </div>
            <div class='row mt-4'>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Monto</th>
                        </tr>
                    </thead>
                    <tbody id="tableContent">
                        <?php echo getTransaction() ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>