<html lang="en">
    <?php
        require_once('head.php');
    ?>
    <body>
        <?php
            require_once('nav.php');
        ?>
        <div class="container">
            <div class='row mt-4'>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tipo Transacción</label>
                        <select class="form-select" id='type_tran'>
                            <option selected>Selecciona...</option>
                            <option value="0">Ingreso</option>
                            <option value="1">Egreso</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="detail">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Monto</label>
                        <input type="number" class="form-control" id="value_tran">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <button class="btn btn-primary" onclick="insertTransaction()">Guardar</button>
                    <div id="AddSuccess" class="alert alert-success" role="alert" style="display: none">
                        Ingresado
                    </div>
                    <div id="AddError" class="alert alert-danger" role="alert" style="display: none">
                        Error Favor intentar más tarde
                    </div>
                    <div id="AddInfo" class="alert alert-info" role="alert" style="display: none">
                        Respuesta
                    </div>
            </div>
        </div>
    </body>
</html>