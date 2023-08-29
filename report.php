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