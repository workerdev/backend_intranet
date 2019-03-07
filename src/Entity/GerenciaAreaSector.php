<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GerenciaAreaSector
 * @ORM\Table(name="cb_proc_gas", uniqueConstraints={@ORM\UniqueConstraint(name="cb_gas_id", columns={"cb_gas_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\GerenciaAreaSectorRepository")
 */
class GerenciaAreaSector
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_gas_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \responsable
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_gas_fkresponsable", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkresponsable;
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_gas_codigo", type="text", nullable=false)
     */
    private $codigo;
     /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_gas_vigente", type="string", length=10, nullable=false)
     */
    private $vigente;
    
    /**
     * @var \gerencia
     *
     * @ORM\ManyToOne(targetEntity="Gerencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_gas_fkgerencia", referencedColumnName="cb_gerencia_id")
     * })
     * @Assert\NotBlank
     */
    private $fkgerencia;

    /**
     * @var \area
     *
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_gas_fkarea", referencedColumnName="cb_area_id")
     * })
     * @Assert\NotBlank
     */
    private $fkarea;

    /**
     * @var \sector
     *
     * @ORM\ManyToOne(targetEntity="Sector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_gas_fksector", referencedColumnName="cb_sector_id")
     * })
     * @Assert\NotBlank
     */
    private $fksector;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_gas_estado", type="integer", nullable=false)
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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
    
    public function getFkresponsable(): ?Usuario
    {
        return $this->fkresponsable;
    }

    public function setFkresponsable(Usuario $fkresponsable): self
    {
        $this->fkresponsable = $fkresponsable;

        return $this;
    } 

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    } 

    public function getVigente(): ?string
    {
        return $this->vigente;
    }

    public function setVigente(string $vigente): self
    {
        $this->vigente = $vigente;

        return $this;
    }   

    public function getFkgerencia(): ?Gerencia
    {
        return $this->fkgerencia;
    }

    public function setFkgerencia(?Gerencia $fkgerencia): self
    {
        $this->fkgerencia = $fkgerencia;

        return $this;
    }

    public function getFkarea(): ?Area
    {
        return $this->fkarea;
    }

    public function setFkarea(?Area $fkarea): self
    {
        $this->fkarea = $fkarea;

        return $this;
    }   

    public function getFksector(): ?Sector
    {
        return $this->fksector;
    }

    public function setFksector(?Sector $fksector): self
    {
        $this->fksector = $fksector;

        return $this;
    }
}