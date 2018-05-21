<?php
/**
 *
 * @author Willian
 */
interface IGeneral {
    
    public function RegistrarPaciente(Pacientes $pacientes);
    public function RegistrarMedico(Medicos $medicos);
    public function RegistrarHv(Hv $hv);
    public function ListaDepartamento();
    public function ListaMunicipiosPorDepartamento();
    public function ListaHv();
    public function ListaConsultorio();
    public function ListaEtapaTumor();
    public function RegistrarConsultorio(Consultorio $consultorio);
    public function RegistrarEtapaTumor(EtapaTumor $etapatumor);
    public function RegistrarClasificacionTumor(Clasificaciontumor $clasificaciontumor);
    public function RegistrarTipoTumor(Tipotumor $tipotumor);
    public function RegistrarMedicamentos(Medicamentos $medicamentos);
    public function ListaTumorprimario();
    public function ListaGanglioslinfaticos();
    public function ListaMetastasis();
    public function ListaClasificaciontumor();
    public function ListaTipotumor();
    public function ListaMedicamentos();
    public function ListaConsultorios();

}

?>