<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * SectorAudit
 * @ORM\Table(name="cb_aud_sectoraud", uniqueConstraints={@ORM\UniqueConstraint(name="cb_sectores_id", columns={"cb_sectores_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SectorAuditRepository")
 */
class SectorAudit
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_sectores_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_sectores_fkauditoria", referencedColumnName="cb_auditoria_id",nullable=false)
     * })
     * @Assert\NotBlank
     */
    private $fkauditoria;
    
    /**
     * @var \gas
     *
     * @ORM\ManyToOne(targetEntity="GerenciaAreaSector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_sectores_fkgas", referencedColumnName="cb_gas_id",nullable=false)
     * })
     */
    private $fkgas;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_sectores_estado", type="integer", nullable=false)
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

    public function getFkauditoria(): ?Auditoria
    {
        return $this->fkauditoria;
    }

    public function setFkauditoria(?Auditoria $fkauditoria): self
    {
        $this->fkauditoria = $fkauditoria;

        return $this;
    }  

    public function getFkgas(): ?GerenciaAreaSector
    {
        return $this->fkgas;
    }

    public function setFkgas(?GerenciaAreaSector $fkgas): self
    {
        $this->fkgas = $fkgas;

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