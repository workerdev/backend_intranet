<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Correo
 * @ORM\Table(name="cb_cfg_correo", indexes={@ORM\Index(name="cb_correo_id", columns={"cb_correo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\CorreoRepository")
 */
class Correo
{
   /**
     * @var int
     *
     * @ORM\Column(name="cb_correo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correo_asunto", type="text", nullable=false)
     */
    private $asunto;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correo_mensaje", type="text", nullable=false)
     */
    private $mensaje;
    
    /**
     * @var \usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_correo_fkusuario", referencedColumnName="cb_usuario_id",nullable=true)
     * })
     */
    private $fkusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_correo_tipo", type="text", nullable=false)
     */
    private $tipo;
     
    /**
     * @var int
     *
     * @ORM\Column(name="cb_correo_estado", type="integer", nullable=false)
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(string $asunto): self
    {
        $this->asunto = $asunto;

        return $this;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }  

    public function getFkusuario(): ?Usuario
    {
        return $this->fkusuario;
    }

    public function setFkusuario(?Usuario $fkusuario): self
    {
        $this->fkusuario = $fkusuario;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

}
