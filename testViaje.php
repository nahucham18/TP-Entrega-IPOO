<?php

//////////CLASES////////////////////

class Pasajero
{
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;

    public function __construct($nombre, $apellido, $documento, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $documento;
    }

    public function getNombrePasajero()
    {
        return $this->nombre;
    }

    public function setNombrePasajero($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidoPasajero()
    {
        return $this->apellido;
    }

    public function setApellidoPasajero($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDocumentoPasajero()
    {
        return $this->documento;
    }

    public function setDocumentoPasajero($documento)
    {
        $this->documento = $documento;
    }

    public function getTelefonoPasajero()
    {
        return $this->telefono;
    }

    public function setTelefonoPasajero($telefono)
    {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "\n   Nombre del pasajero: " . $this->getNombrePasajero() . "   Apellido del pasajero: " . $this->getApellidoPasajero() . "   Documento del pasajero: " . $this->getDocumentoPasajero() . "   Telefono del pasajero: " . $this->getTelefonoPasajero() . "";
    }
}

class Viaje
{
    private $codigo;
    private $destino;
    private $cantMax;
    private $pasajeros;
    private $responsableV;
    private $pasajeroBuscado;

    public function __construct($codigo = null, $destino = null, $cantMax = null, $responsableV = null)
    {
        $this->pasajeros = array();
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMax = $cantMax;
        $this->responsableV = $responsableV;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCantMax()
    {
        return $this->cantMax;
    }

    public function setCantMax($cantMax)
    {
        $this->cantMax = $cantMax;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function setPasajeros($pasajeros)
    {
        $this->pasajeros = $pasajeros;
    }
    public function getResponsableV()
    {
        return $this->responsableV;
    }

    public function setResponsableV($responsableV)
    {
        $this->responsableV = $responsableV;
    }

    public function getPasajeroBuscado()
    {
        return $this->pasajeroBuscado;
    }

    public function setPasajeroBuscado($pasajero)
    {
        $this->pasajeroBuscado = $pasajero;
    }

   
    public function agregarPasajero($pasajero)
    {
        $pasajeros = $this->getPasajeros();
        $pasajeroBuscado = array_search($pasajero, $pasajeros);
        if ($pasajeroBuscado !== false) {
            echo "Ya se encuenta el pasajero en el viaje";
        } else {
            if (count($pasajeros) < $this->getCantMax()) {
                $pasajeros[] = $pasajero;
                $this->setPasajeros($pasajeros);
            }else{
                echo "El viaje ya esta en su capacidad maxima de pasajeros, no se registro el pasajero ingresado";
            }
        }
    }

    public function buscarPasajero($documento){
        $pasajeroBuscado = null;
        foreach($this->getPasajeros() as $pasajero){
            if(intval($documento) === intval($pasajero->getDocumentoPasajero())){
                $pasajeroBuscado = $pasajero;
            }
        }
        return $pasajeroBuscado;
    }

    public function __toString()
    {
        $cad = "No hay Viaje registrado";
        if($this->getDestino() !== null){
        if(count($this->getPasajeros()) === 0 ){
            $pasajeros = "No hay pasajeros registrados.";
        }else{
            $pasajeros = implode(", ", $this->getPasajeros());
        }
        $cad = "DATOS DEL VIAJE \nCodigo de viaje: " . $this->getCodigo() . "Destino del viaje: " . $this->getDestino() . "Cantidad maxima: " . $this->getCantMax() . "Pasajeros: " . $pasajeros . "\nDATOS DEL RESPONSABLE DE VIAJE\n" . $this->getResponsableV(); 
        }
        return $cad;
    }
}

class ResponsableV{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado = null, $numLicencia = null, $nombre = null, $apellido = null){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }

    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    
    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function __toString(){
        $cad = "   Numero de empleado: " . $this->getNumEmpleado() . "\n   Numero de licencia: " . $this->getNumLicencia() . "\n   Nombre: " . $this->getNombre() . "\n   Apellido: " . $this->getApellido();
        return $cad;
    }
}

/////OPCIONES DE MENU///////////////
function opcion1()
{
    echo "\nCARGAR INFORMACION DEL VIAJE\n\n";
    echo "Ingrese codigo de viaje: ";
    $codigo = fgets(STDIN);
    echo "Ingrese destino: ";
    $destino = fgets(STDIN);
    echo "Ingrese cantidad maxima de pasajeros: ";
    $cantMax = fgets(STDIN);

    echo "\nDATOS DE RESPONSABLE DEL VIAJE\n\n";
    echo "Ingrese número de empleado del responsable: ";
    $numEmpleado = trim(fgets(STDIN));
    echo "Ingrese número de licencia del responsable: ";
    $numLicencia = trim(fgets(STDIN));
    echo "Ingrese nombre del responsable: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese apellido del responsable: ";
    $apellido = trim(fgets(STDIN));

    $responsableV = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);
    $viaje = new Viaje($codigo, $destino, $cantMax, $responsableV);
    return $viaje;
}

function opcion3($viaje)
{
    echo "\nQuiere agregar un pasajero al viaje? Y/N  :  ";
    $resp = strtolower(fgets(STDIN));
    while (trim($resp) !== 'n') {
        if (trim($resp)  === 'y') {
            $pasajero = crearPasajero();
            $viaje->agregarPasajero($pasajero);
            echo "\nQuiere agregar otro pasajero al viaje? Y/N  :  ";
            $resp = strtolower(fgets(STDIN));
            if (trim($resp) === 'n') {
                echo "\nGracias vuelva pronto!!!";
            }
        } elseif (trim($resp) === "n") {
            echo "\nNo se registro un pasajero";
        } else {
            echo "\nRespues incorrecta";
            echo "\n Quiere agregar otro pasajero al viaje? Y/N";
            $resp = strtolower(fgets(STDIN));
        }
    }
}

function opcion4($viaje)
{
    echo "\nIngrese DNI del pasajero a modificar: ";
    $documento = trim(fgets(STDIN));
    $pasajeroBuscado = $viaje->buscarPasajero($documento);
    if($pasajeroBuscado === null){
        echo "\nNo se encuentra el pasajero con ese documento";
    }else{
        echo "\nPASAJERO: " . $pasajeroBuscado->getNombrePasajero();
        echo "\nque desea modificar del pasajero?\n";
        echo "1- Nombre.\n";
        echo "2- Apellido.\n";
        echo "3- Documento.\n";
        echo "4- Telefono.\n";
        echo "Cualquier boton- Volver.\n";
        echo "Elija una opcion: ";
        $opc = trim(fgets(STDIN));
        switch($opc){
            case 1:
                echo "Ingrese nuevo nombre: ";
                $nombre = trim(fgets(STDIN));
                $pasajeroBuscado->setNombrePasajero($nombre);
                echo "\nCambio realizado";
                break;
            case 2:
                echo "Ingrese nuevo apellido: ";
                $apellido = trim(fgets(STDIN));
                $pasajeroBuscado->setApellidoPasajero($apellido);
                echo "\nCambio realizado";
                break;
            case 3:
                echo "Ingrese nuevo documento: ";
                $documento = trim(fgets(STDIN));
                $pasajeroBuscado->setDocumentoPasajero($documento);
                echo "\nCambio realizado";
                break;
            case 4:
                echo "Ingrese nuevo telefono: ";
                $telefono = trim(fgets(STDIN));
                $pasajeroBuscado->setTelefonoPasajero($telefono);
                echo "\nCambio realizado";
                break;
            default :
                echo "\nNo se realizaron cambios";
                break;       
        }
    }

}

function opcion5($viaje)
{
        $responsableV = $viaje->getResponsableV();
        echo "\nRESPONSABLE: " . $responsableV->getNombre();
        echo "\nque desea modificar del responsable?\n";
        echo "1- Numero de empleado.\n";
        echo "2- Numero de licencia.\n";
        echo "3- Nombre.\n";
        echo "4- Apellido.\n";
        echo "Cualquier boton- Volver.\n";
        echo "Elija una opcion: ";
        $opc = trim(fgets(STDIN));
        switch($opc){
            case 1:
                echo "Ingrese nuevo numero de empleado: ";
                $numEmpleado = trim(fgets(STDIN));
                $responsableV->setNumEmpleado($numEmpleado);
                echo "\nCambio realizado";
                break;
            case 2:
                echo "Ingrese nuevo numero de licencia: ";
                $numLicencia = trim(fgets(STDIN));
                $responsableV->setNumLicencia($numLicencia);
                echo "\nCambio realizado";
                break;
            case 3:
                echo "Ingrese nuevo nombre: ";
                $nombre = trim(fgets(STDIN));
                $responsableV->setNombre($nombre);
                echo "\nCambio realizado";
                break;
            case 4:
                echo "Ingrese nuevo apellido: ";
                $apellido = trim(fgets(STDIN));
                $responsableV->setApellido($apellido);
                echo "\nCambio realizado";
                break;
            default :
                echo "\nNo se realizaron cambios";
                break;       
        }
}



//////FUNCIONES///////////////
function crearPasajero()
{
    echo "\nIngrese Nombre: ";
    $nombre = fgets(STDIN);
    echo "Ingrese Apellido: ";
    $apellido = fgets(STDIN);
    echo "Ingrese Documento: ";
    $documento = fgets(STDIN);
    echo "Ingrese telefono: ";
    $telefono = fgets(STDIN);
    $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
    return $pasajero;
}

$viaje = new Viaje();

do {
    echo "\n\n";
    echo "------------  MENU  ---------------\n";
    if($viaje->getCodigo() == null){
        echo "1) Cargar información del viaje\n";
    }else{
        echo "1) Cargar nueva información del viaje - YA TIENE UN VIAJE CARGADO!!\n";
    };
    echo "2) Mostrar datos del viaje\n";
    if(($viaje->getDestino()) === null){
        echo "3) Agregar pasajero al viaje - NO HAY VIAJE CARGADO\n";
    }elseif((count($viaje->getPasajeros()) === intval($viaje->getCantMax())) && (count($viaje->getPasajeros()) !== 0)){
        echo "3) Agregar pasajero al viaje - EL VIAJE ESTA LLENO\n";
    }else{
        echo "3) Agregar pasajero al viaje\n";
    }
    echo "4) Modificar datos del pasajero\n";
    echo "5) Modificar datos del responsable\n";
    echo "6) Salir\n\n";
    echo "Seleccione una opción: ";
    $resp = intval(fgets(STDIN));
    switch ($resp) {
        case 1:
            $viaje = opcion1();
            break;
        case 2:
            echo $viaje;    
            break;
        case 3:
            if(count($viaje->getPasajeros()) === intval($viaje->getCantMax())){
                echo "EL VIAJE ESTA LLENO";
            }else{
                opcion3($viaje);           
            }
            break;
        case 4:
            if($viaje->getDestino() === null){
                echo "No hay viaje cargado";
            }else{
                opcion4($viaje);
            }
            break;
        case 5:
            if($viaje->getDestino() === null){
                echo "No hay viaje cargado";
            }else{
            opcion5($viaje);
            }
            break;
        case 6:
            echo "Gracias vuelva pronto!!!";
            break;
        default:
            echo "Opcion incorrecta";
            break;
    }
} while ($resp !== 6);
