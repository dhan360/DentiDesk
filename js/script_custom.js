function insertTransaction() {
    var type = jQuery("#type_tran").val();
    var detail = jQuery("#detail").val();
    var value = jQuery("#value_tran").val();
    var date = jQuery("#date").val();
    var mensaje = 'Debes indicar';
    console.log(date);
    if(type == 'Selecciona...'){
        mensaje = mensaje + ' tipo de Transacción /';
    }
    if(detail == ''){
        mensaje = mensaje + ' detalle /';
    }
    if(value == ''){
        mensaje = mensaje + ' monto /';
    }
    if(date == ''){
        mensaje = mensaje + ' fecha /';
    }
    if(mensaje != 'Debes indicar'){
        jQuery("#AddInfo").empty();
        jQuery("#AddInfo").html(mensaje);
        jQuery("#AddInfo").show();
    }
    else{
        jQuery.ajax({
            data: { type: type, detail: detail, value: value, date: date, action: 'insertTransaction' },
            url: 'src/transactionController.php',
            type: 'post',
            success: function(response) {
                console.log(response);
                if (response == 'Ingresado') {
                    jQuery("#AddSuccess").show();
                    jQuery("#AddError").hide();
                    jQuery("#AddInfo").hide();
                } else {
                    jQuery("#AddSuccess").hide();
                    jQuery("#AddError").show();
                    jQuery("#AddInfo").hide();
                }
            }
        });
    }
    
}

function getTransactions(){
    var month = jQuery("#month").val();
    jQuery.ajax({
        data: { action: 'getTransactions', month: month },
        url: 'src/transactionController.php',
        type: 'post',
        success: function(response) {
            jQuery("#tableContent").empty();
            jQuery("#tableContent").html(response); 
        }
    });
}