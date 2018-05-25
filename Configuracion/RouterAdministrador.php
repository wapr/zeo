<?php

/**
 * Description of RouterPaciente
 *
 * @author Willian
 */
class RouterAdministrador {

    public function LoadView($view) {
        switch ($view) :
            case 'logout':
                include_once ('../../Vistas/Administrador/' . $view . '.php');
                break;
            case 'medicos':
                include_once ('../../Vistas/Administrador/' . $view . '.php');
            break;
            case 'regusuario':
                include_once ('../../Vistas/Administrador/' . $view . '.php');
            break;
            case 'editMedico':
                include_once ('../../Vistas/Administrador/' . $view . '.php');
            break;
            default:
                include_once ('../../Vistas/Administrador/error.php');
        endswitch;
    }

    public function validateURL($variable) {
        if (empty($variable)) {
            include_once('../../Vistas/Administrador/medicos.php');
        } else {
            return true;
        }
    }

}

?>
