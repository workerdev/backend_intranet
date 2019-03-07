<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * RecursoNecesario
 * @ORM\Table(name="cb_proc_recurso_necesario", indexes={@ORM\Index(name="cb_recurso_necesario_id", columns={"cb_recurso_necesario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\RecursoNecesarioRepository")
 */
class RecursoNecesario
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_recurso_necesario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="cb_recurso_necesario_detalle", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    private $detalle;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_recurso_necesario_estado", type="integer", nullable=false)
     */
    private $estado;

     /**
     * @var \ficha
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_recurso_necesario_fkficha", referencedColumnName="cb_ficha_procesos_id")
     * })
      * @Assert\NotBlank
     */
    private $fkficha;

     /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="Recurso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_recurso_necesario_fktipo", referencedColumnName="cb_tipo_recurso_id")
     * })
      * @Assert\NotBlank
     */
    private $fktipo;

   


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getDetalle(): ?string
    {
        return $this->detalle;
    }

    public function setDetalle(string $detalle): self
    {
        $this->detalle = $detalle;

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

    public function getFkficha(): ?FichaProcesos
    {
        return $this->fkficha;
    }

    public function setFkficha(?FichaProcesos $fkficha): self
    {
        $this->fkficha = $fkficha;

        return $this;
    }

    public function getFktipo(): ?Recurso
    {
        return $this->fktipo;
    }

    public function setFktipo(?Recurso $fktipo): self
    {
        $this->fktipo = $fktipo;

        return $this;
    }
}
