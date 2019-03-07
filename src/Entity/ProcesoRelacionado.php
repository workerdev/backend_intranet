<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ProcesoRelacionado
 * @ORM\Table(name="cb_proc_procrelacionado", uniqueConstraints={@ORM\UniqueConstraint(name="cb_proceso_relacionado_id", columns={"cb_proceso_relacionado_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ProcesoRelacionadoRepository")
 */
class ProcesoRelacionado
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_proceso_relacionado_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \proceso
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_procesorelacionado_fkproceso", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkproceso;

    /**
     * @var \procesorel
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_procesorelacionado_fkprocesorel", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkprocesorel;

       /**
     * @var int
     *
     * @ORM\Column(name="cb_procesorelacionado_estado", type="integer", nullable=false)
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

    public function getFkproceso(): ?FichaProcesos
    {
        return $this->fkproceso;
    }

    public function setFkproceso(?FichaProcesos $fkproceso): self
    {
        $this->fkproceso = $fkproceso;

        return $this;
    }

    public function getFkprocesorel(): ?FichaProcesos
    {
        return $this->fkprocesorel;
    }

    public function setFkprocesorel(?FichaProcesos $fkprocesorel): self
    {
        $this->fkprocesorel = $fkprocesorel;

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