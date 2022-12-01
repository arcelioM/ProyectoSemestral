<?php

namespace model;

use model\Estado;
class TipoPago{
    private ?int $idTipoPago;

    private ?string $nombre;

    private ?Estado $estadoId;

    private $fechaCreacion;

    public function __construct(int $idTipoPago=0,string $nombre="",Estado $estadoId=null, $fechaCreacion=null)
    {
        $this->idTipoPago = $idTipoPago;
        $this->nombre = $nombre;
        $this->estadoId = $estadoId;
        $this->fechaCreacion = $fechaCreacion;
    }


}
