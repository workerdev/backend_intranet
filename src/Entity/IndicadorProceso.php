<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * IndicadorProceso
 * @ORM\Table(name="cb_procesos_indicador_proceso", indexes={@ORM\Index(name="cb_indicador_proceso_id", columns={"cb_indicador_proceso_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\IndicadorProcesoRepository")
 */
class IndicadorProceso
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_indicador_proceso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \ficha
     *
     * @ORM\ManyToOne(targetEntity="FichaProcesos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_indicador_proceso_fkficha", referencedColumnName="cb_ficha_procesos_id")
     * })
     * @Assert\NotBlank
     */
    private $fkficha;


    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_codigo", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_objetivo", type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $objetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_descripcion", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_formula", type="text", nullable=true)
       * @Assert\NotBlank
     */
    private $formula;

    /**
     * @var \unidad
     *
     * @ORM\ManyToOne(targetEntity="UnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_indicador_proceso_fkunidad", referencedColumnName="cb_unidad_medida_id")
     * })
     * @Assert\NotBlank
     */
    private $fkunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_metamensual", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $metamensual;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_metaanual", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $metaanual;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_indicador_proceso_vigente", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $vigente;

    /**
     * @var \responsable
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_indicador_proceso_fkresponsable", referencedColumnName="cb_usuario_id")
     * })
     * @Assert\NotBlank
     */
    private $fkresponsable;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_indicador_proceso_estado", type="integer", nullable=false)
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

    public function getFkficha(): ?FichaProcesos
    {
        return $this->fkficha;
    }

    public function setFkficha(?FichaProcesos $fkficha): self
    {
        $this->fkficha = $fkficha;

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

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(string $objetivo): self
    {
        $this->objetivo = $objetivo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFormula(): ?string
    {
        return $this->formula;
    }

    public function setFormula(string $formula): self
    {
        $this->formula = $formula;

        return $this;
    }

    public function getFkunidad(): ?UnidadMedida
    {
        return $this->fkunidad;
    }

    public function setFkunidad(?UnidadMedida $fkunidad): self
    {
        $this->fkunidad = $fkunidad;

        return $this;
    }

    public function getMetamensual(): ?string
    {
        return $this->metamensual;
    }

    public function setMetamensual(string $metamensual): self
    {
        $this->metamensual = $metamensual;

        return $this;
    }

    public function getMetaanual(): ?string
    {
        return $this->metaanual;
    }

    public function setMetaanual(string $metaanual): self
    {
        $this->metaanual = $metaanual;

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

    public function getFkresponsable(): ?Usuario
    {
        return $this->fkresponsable;
    }

    public function setFkresponsable(?Usuario $fkresponsable): self
    {
        $this->fkresponsable = $fkresponsable;

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
