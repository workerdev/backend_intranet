<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Unidad
 * @ORM\Table(name="cb_proc_unidad", uniqueConstraints={@ORM\UniqueConstraint(name="cb_unidad_id", columns={"cb_unidad_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UnidadRepository")
 */
class Unidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_unidad_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_unidad_nombre", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;
    
    /**
     * @var \correlativo
     *
     * @ORM\ManyToOne(targetEntity="ControlCorrelativo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_unidad_fkcorrelativo", referencedColumnName="cb_control_correlativo_id")
     * })
     * @Assert\NotBlank
     */
    private $fkcorrelativo;
    
    /**
     * @var \superior
     *
     * @ORM\ManyToOne(targetEntity="Unidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_unidad_fksuperior", referencedColumnName="cb_unidad_id")
     * })
     *
     * @Assert\NotBlank
     */
    private $fksuperior;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_unidad_estado", type="integer", nullable=true)
     *
     */
    private $estado;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }  

    public function getFkcorrelativo(): ?ControlCorrelativo
    {
        return $this->fkcorrelativo;
    }

    public function setFkcorrelativo(?ControlCorrelativo $fkcorrelativo): self
    {
        $this->fkcorrelativo = $fkcorrelativo;

        return $this;
    }  

    public function getFksuperior(): ?Unidad
    {
        return $this->fksuperior;
    }

    public function setFksuperior(?Unidad $fksuperior): self
    {
        $this->fksuperior = $fksuperior;

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