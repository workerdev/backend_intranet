<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * AuditoriaEquipo
 * @ORM\Table(name="cb_aud_auditoria_equipo", uniqueConstraints={@ORM\UniqueConstraint(name="cb_auditoria_equipo_id", columns={"cb_auditoria_equipo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuditoriaEquipoRepository")
 */
class AuditoriaEquipo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoria_equipo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_equipo_fkauditoria", referencedColumnName="cb_auditoria_id")
     * })
     * @Assert\NotBlank
     */
    private $fkauditoria;
    
    /**
     * @var \auditor
     *
     * @ORM\ManyToOne(targetEntity="Auditor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_equipo_fkauditor", referencedColumnName="cb_auditor_id")
     * })
     * @Assert\NotBlank
     */
    private $fkauditor;
    
    /**
     * @var \tipo
     *
     * @ORM\ManyToOne(targetEntity="TipoAuditor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_auditoria_equipo_fktipo", referencedColumnName="cb_tipo_auditor_id")
     * })
     * @Assert\NotBlank
     */
    private $fktipo;
    
    /**
     * @var int
     *
     * @ORM\Column(name="cb_auditoria_equipo_estado", type="integer", nullable=false)
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

    public function getFkauditor(): ?Auditor
    {
        return $this->fkauditor;
    }

    public function setFkauditor(?Auditor $fkauditor): self
    {
        $this->fkauditor = $fkauditor;

        return $this;
    }  

    public function getFktipo(): ?TipoAuditor
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoAuditor $fktipo): self
    {
        $this->fktipo = $fktipo;

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