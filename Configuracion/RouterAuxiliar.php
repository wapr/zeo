<?php

/**
 * Description of RouterAuxiliar
 *
 * @author Willian
 */
class RouterAuxiliar {

    public function LoadView($view) {
        switch ($view) :
                case 'iReportCitaPaciente':
                    include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
                case 'iReportPaciente':
                    include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
                case 'iReportActividadesPaciente':
                    include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
                case 'iReportMedicamentoPaciente':
                    include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
                case 'regusuario':
                    include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
            case 'logout':
                include_once ('../../Vistas/Auxiliar/' . $view . '.php');
                break;
            default:
                include_once ('../../Vistas/Auxiliar/error.php');
        endswitch;
    }

    public function validateURL($variable) {
        if (empty($variable)) {
            include_once('../../Vistas/Auxiliar/iReportCitaPaciente.php');
        } else {
            return true;
        }
    }

}

?>