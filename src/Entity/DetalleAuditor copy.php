<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleAuditor
 * @ORM\Table(name="cb_auditoria_detalle_auditor", indexes={@ORM\Index(name="cb_detalle_auditor_id", columns={"cb_detalle_auditor_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\DetalleAuditorRepository")
 */
class DetalleAuditor
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_detalle_auditor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

         /**
     * @var \auditoria
     *
     * @ORM\ManyToOne(targetEntity="Auditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_detalle_auditor_fkauditoria", referencedColumnName="cb_auditoria_id")
     * })
     */
    private $fkauditoria;

         /**
     * @var \auditor
     *
     * @ORM\ManyToOne(targetEntity="Auditor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_detalle_auditor_fkauditor", referencedColumnName="cb_auditor_id")
     * })
     */
    private $fkauditor;

  

    /**
     * @var int
     *
     * @ORM\Column(name="cb_detalle_auditor_estado", type="integer", nullable=false)
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
    
    public function getFkauditoria(): ?Auditoria
    {
        return $this->fkauditoria;
    }

    public function setFkauditoria(?Auditoria $fkauditoria): self
    {
        $this->fkauditoria = $fkauditoria;

        return $this;
    }    public function getFkauditor(): ?Auditor
    {
        return $this->fkauditor;
    }

    public function setFkauditor(?Auditor $fkauditor): self
    {
        $this->fkauditor = $fkauditor;

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
