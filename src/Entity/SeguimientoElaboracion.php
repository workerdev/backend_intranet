<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * SeguimientoElaboracion
 * @ORM\Table(name="cb_gest_seg_elaboracion", indexes={@ORM\Index(name="cb_seguimiento_elaboracion_id", columns={"cb_seguimiento_elaboracion_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeguimientoElaboracionRepository")
 */
class SeguimientoElaboracion
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_elaboracion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var \documento
     *
     * @ORM\ManyToOne(targetEntity="Documento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_elaboracion_fkdocumento", referencedColumnName="cb_documento_id")
     * })
     * @Assert\NotBlank
     */
    private $fkdocumento;

    /**
     * @var \estado
     *
     * @ORM\ManyToOne(targetEntity="EstadoSeguimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_elaboracion_fkestado", referencedColumnName="cb_estado_seguimiento_id")
     * })
     * @Assert\NotBlank
     */
    private $fkestado;

    /**
     * @var \revisor
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimiento_elaboracion_fkestado", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkrevisor;



    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimiento_elaboracion_estado", type="integer", nullable=false)
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

    public function getFkdocumento(): ?Documento
    {
        return $this->fkdocumento;
    }

    public function setFkdocumento(?Documento $fkdocumento): self
    {
        $this->fkdocumento = $fkdocumento;

        return $this;
    }
    public function getFkestado(): ?EstadoSeguimiento
    {
        return $this->fkestado;
    }

    public function setFkestado(?EstadoSeguimiento $fkestado): self
    {
        $this->fkestado = $fkestado;

        return $this;
    } 
    
    public function getFkrevisor(): ?Usuario
    {
        return $this->fkrevisor;
    }

    public function setFkrevisor(?Usuario $fkrevisor): self
    {
        $this->fkrevisor = $fkrevisor;

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
