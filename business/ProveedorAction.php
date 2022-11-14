<?php

include './ProveedorBusiness.php'; 


if (isset($_POST['actualizar'])) {
    if (isset($_POST['tbproveedorid']) && isset($_POST['tbproveedornombre']) && isset($_POST['tbproveedorapellido']) && isset($_POST['tbproveedorcomercio']) && isset($_POST['tbproveedorcedula']) && isset($_POST['tbproveedortelefono']) && isset($_POST['tbproveedorcorreo'])) {
        $tbProveedorId = $_POST['tbproveedorid'];
        $tbProveedorNombre = $_POST['tbproveedornombre'];
        $tbProveedorApellido = $_POST['tbproveedorapellido'];
        $tbProveedorComercio = $_POST['tbproveedorcomercio'];
        $tbProveedorCedula = str_replace('-','',$_POST['tbproveedorcedula']);
        $tbProveedorTelefono = str_replace('-','',$_POST['tbproveedortelefono']);
        $tbProveedorCorreo = $_POST['tbproveedorcorreo'];
        

        
        if (strlen($tbProveedorId) > 0 && strlen($tbProveedorNombre) > 0 && strlen($tbProveedorApellido) > 0 && strlen($tbProveedorComercio) > 0  && strlen($tbProveedorCedula) > 0 && strlen($tbProveedorTelefono) > 0 && strlen($tbProveedorCorreo) > 0) {
            if (!is_numeric($tbProveedorNombre) && !is_numeric($tbProveedorApellido) && ctype_alpha($tbProveedorNombre) && ctype_alpha($tbProveedorApellido)) {
                if (filter_var($tbProveedorCorreo, FILTER_VALIDATE_EMAIL)) {
                $Proveedor = new Proveedor($tbProveedorId, $tbProveedorNombre, $tbProveedorApellido, $tbProveedorComercio, $tbProveedorCedula, $tbProveedorTelefono, $tbProveedorCorreo);

                $ProveedorBusiness = new ProveedorBusiness();

                $result = $ProveedorBusiness->updateProveedor($Proveedor);
                if($ProveedorBusiness->buscarProveedorDuplicado($tbProveedorCedula)==false){
                    $result = $ProveedorBusiness->insertProveedor($Proveedor);
                }
                if ($result == 1) {
                    header("location: ../view/ProveedorView.php?success=inserted");
                }else {
                    header("location: ../view/ProveedorView.php?error=idError&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
                }
            }else{
                header("location: ../view/ProveedorView.php?error=emailError&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono");
            }
        }else {
            if ((is_numeric($tbProveedorNombre) || !ctype_alpha($tbProveedorNombre)) && (is_numeric($tbProveedorApellido) || !ctype_alpha($tbProveedorApellido))) {
                header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
            } else
            if (is_numeric($tbProveedorNombre) || !ctype_alpha($tbProveedorNombre)) {
                header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&va2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
            } else
            if (is_numeric($tbProveedorApellido) || !ctype_alpha($tbProveedorApellido)) {
                header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
            }
        }

} else {
header("location: ../view/ProveedorView.php?error=emptyField&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
}
} else {
header("location: ../view/ProveedorView.php?error=error&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
}
}else if (strcmp($_POST['action'], 'delete') == 0) { //delete
    if (isset($_POST['idProveedor'])) {

        $proveedorId = $_POST['idProveedor'];

        $ProveedorBusiness = new ProveedorBusiness();
        $result = $ProveedorBusiness->deleteProveedor($proveedorId);


        if ($result == 1) {
            echo "Transaccion realizada";
        } else {
            echo "Error al procesar la transacción";
        }
    } else {
        echo "Error de informacion";
    }
} else if (isset($_POST['crear'])) {

    if (isset($_POST['tbproveedornombre']) && isset($_POST['tbproveedorapellido']) && isset($_POST['tbproveedorapellido']) && isset($_POST['tbproveedorcedula']) && isset($_POST['tbproveedortelefono']) && isset($_POST['tbproveedorcorreo'])) {
  
        $tbProveedorNombre = $_POST['tbproveedornombre'];
        $tbProveedorApellido = $_POST['tbproveedorapellido'];
        $tbProveedorComercio = $_POST['tbproveedorcomercio'];
        $tbProveedorCedula = str_replace('-','',$_POST['tbproveedorcedula']);
        $tbProveedorTelefono = str_replace('-','',$_POST['tbproveedortelefono']);
        $tbProveedorCorreo = $_POST['tbproveedorcorreo'];
        
        if (strlen($tbProveedorNombre) > 0 && strlen($tbProveedorApellido) >  0  && strlen($tbProveedorComercio) > 0 && strlen($tbProveedorCedula) > 0 && strlen($tbProveedorTelefono) > 0 && strlen($tbProveedorCorreo) > 0) {
            if (!is_numeric($tbProveedorNombre) && !is_numeric($tbProveedorApellido) && ctype_alpha($tbProveedorNombre) && ctype_alpha($tbProveedorApellido)) {
                if(filter_var($tbProveedorCorreo, FILTER_VALIDATE_EMAIL)){
                    $Proveedor = new Proveedor(0, $tbProveedorNombre, $tbProveedorApellido, $tbProveedorComercio, $tbProveedorCedula, $tbProveedorTelefono, $tbProveedorCorreo);

                    $ProveedorBusiness = new ProveedorBusiness();
                    $result = 0;
                    if($ProveedorBusiness->buscarProveedorDuplicado($tbProveedorCedula)==false){
                        $result = $ProveedorBusiness->insertProveedor($Proveedor);
                    }
                    if ($result == 1) {
                        header("location: ../view/ProveedorView.php?success=inserted");
                    }else {
                        header("location: ../view/ProveedorView.php?error=idError&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
                    }
                }else{
                    header("location: ../view/ProveedorView.php?error=emailError&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono");
                }
            }else {
                if ((is_numeric($tbProveedorNombre) || !ctype_alpha($tbProveedorNombre)) && (is_numeric($tbProveedorApellido) || !ctype_alpha($tbProveedorApellido))) {
                    header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
                } else
                if (is_numeric($tbProveedorNombre) || !ctype_alpha($tbProveedorNombre)) {
                    header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&va2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
                } else
                if (is_numeric($tbProveedorApellido) || !ctype_alpha($tbProveedorApellido)) {
                    header("location: ../view/ProveedorView.php?error=stringFormat&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
                }
            }
    
} else {
    header("location: ../view/ProveedorView.php?error=emptyField&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
}
} else {
header("location: ../view/ProveedorView.php?error=error&var3=$tbProveedorCedula&var1=$tbProveedorNombre&var2=$tbProveedorApellido&var4=$tbProveedorTelefono&var5=$tbProveedorCorreo");
}
}