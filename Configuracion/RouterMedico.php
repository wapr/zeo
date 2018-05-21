<?php

/**
 * Description of RouterPaciente
 *
 * @author Willian
 */
class RouterMedico {

    public function LoadView($view) {
        switch ($view) :
            case 'inicio':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'pacientes':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'auxiliares':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'especialidad':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'horario':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'verpaciente':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'gestionpaciente':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'consultorios':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'etapatumor':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'regconsultorio':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
             case 'clasificaciontumor':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'AsigEtapa':
                include_once ('../../Vistas/Medico/' . $view . '.php');
                break;
            case 'tipotumor':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            case 'medicamentos':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            case 'regmedicamento':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            case 'medicamentosactualizar':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            case 'consultoriosactualizar':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            case 'logout':
                include_once ('../../Vistas/Medico/' . $view . '.php');
            break;
            default:
                include_once ('../../Vistas/Medico/error.php');
        endswitch;
    }

    public function validateURL($variable) {
        if (empty($variable)) {
            include_once('../../Vistas/Medico/inicio.php');
        } else {
            return true;
        }
    }

}

?>
