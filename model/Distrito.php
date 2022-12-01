<?php

namespace model;
use model\Estado;
use model\Provincia;
class Distrito{
    private ?int $idDistrito;

    private ?string $nombre;

    private ?Provincia $provinciaId;

    private ?Estado $estadoId;

    public function __construct(int $idDistrito=0,string $nombre="",Provincia $provinciaId=null, Estado $estadoId=null)
    {
        $this->idDistrito = $idDistrito;
        $this->nombre = $nombre;
        $this->provinciaId = $provinciaId;
        $this->estadoId = $estadoId;
    }


}
