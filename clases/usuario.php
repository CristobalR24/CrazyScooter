<?php
Class Usuario{
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Contrasena;
    public $Tipo_Usuario;

    function __construct($n,$a,$c,$p,$t){
        $this->Nombre  = $n;
        $this->Apellido = $a;
        $this->Correo = $c;
        $this->Contrasena = $p;
        $this->Tipo_Usuario = $t;
    }
}
?>