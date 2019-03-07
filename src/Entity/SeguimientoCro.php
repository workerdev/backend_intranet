<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * SeguimientoCro
 * @ORM\Table(name="cb_procesos_seguimientocro", uniqueConstraints={@ORM\UniqueConstraint(name="cb_seguimientocro_id", columns={"cb_seguimientocro_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SeguimientoCroRepository")
 */
class SeguimientoCro
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimientocro_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


/**
     * @var \riesgos
     *
     * @ORM\ManyToOne(targetEntity="RiesgosOportunidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_seguimientocro_fkriesgos", referencedColumnName="cb_riesgos_oportunidades_id")
     * })
     * @Assert\NotBlank
     */
    private $fkriesgos;

    /**
     * @var date
     *
     * @ORM\Column(name="cb_seguimientocro_fechaseg", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fechaseg;

     /**
     * @var \responsable
     *@ORM\ManyToOne(targetEntity="Usuario")
     *@ORM\JoinColumns({
     * @ORM\JoinColumn(name="cb_seguimientocro_fkresponsable", referencedColumnName="cb_usuario_id")
     *}) 
     * @Assert\NotBlank
     */
    private $fkresponsable;

    /**
    * @var string
    *
    * @ORM\Column(name="cb_seguimientocro_observaciones", type="string", length=300, nullable=false)
     * @Assert\NotBlank
    */
    private $observaciones;
    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimientocro_estadoseg",  type="string", length=60, nullable=false)
     * @Assert\NotBlank
     */
    private $estadoseg;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_seguimientocro_estado", type="integer", nullable=false)
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

    public function getFkriesgos(): ?RiesgosOportunidades
    {
        return $this->fkriesgos;
    }

    public function setFkriesgos(?RiesgosOportunidades $fkriesgos): self
    {
        $this->fkriesgos = $fkriesgos;

        return $this;
    }
    
    public function getFechaSeg(): ?\DateTimeInterface
    {
        return $this->fechaseg;
    }

    public function setFechaSeg(\DateTimeInterface $fechaseg): self
    {
        $this->fechaseg = $fechaseg;
        return $this;
    }
    
    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): self
    {
        $this->observaciones = $observaciones;

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


    public function getEstadoSeg(): ?string
    {
        return $this->estadoseg;
    }

    public function setEstadoSeg(string $estadoseg): self
    {
        $this->estadoseg = $estadoseg;

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
