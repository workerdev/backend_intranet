<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * FichaProcesos
 * @ORM\Table(name="cb_procesos_ficha_procesos", indexes={@ORM\Index(name="cb_ficha_procesos_id", columns={"cb_ficha_procesos_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\FichaProcesosRepository")
 */
class FichaProcesos
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_ficha_procesos_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
     /**
     * @var \areagerenciasector
     *
     * @ORM\ManyToOne(targetEntity="GerenciaAreaSector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_ficha_procesos_fkareagerenciasector", referencedColumnName="cb_gas_id")
     * })
      * @Assert\NotBlank
     */
    private $fkareagerenciasector;
       
    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="cb_ficha_procesos_codproceso", type="text", nullable=false)
     */
    private $codproceso;

    /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_nombre", type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

     /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_objetivo", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $objetivo;
     /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_vigente", type="text", nullable=false)
      * @Assert\NotBlank
     */
    private $vigente;

    /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_version", type="text", nullable=false)
     * @Assert\NotBlank
     * @Assert\Type(
     *     type="numeric",
     *     message="El valor no es valido , solo se permite numeros."
     * )
     */
    private $version;
    /**
     * @var date
     * @ORM\Column(name="cb_ficha_procesos_fechaemision", type="date", nullable=true)
     * @Assert\NotBlank
     */
    private $fechaemision;


    /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_recursosnecesarios", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $recursosnecesarios;
    /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_entradasrequeridas", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $entradasrequeridas;
    /**
     * @var string
     * @ORM\Column(name="cb_ficha_procesos_salidasesperadas", type="text", nullable=true)
     * @Assert\NotBlank
     */
    private $salidasesperadas;

    /**
     * @var int
     * @ORM\Column(name="cb_ficha_procesos_estado", type="integer", nullable=true)
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


    public function getFkareagerenciasector(): ?GerenciaAreaSector
    {
        return $this->fkareagerenciasector;
    }

    public function setFkareagerenciasector(?GerenciaAreaSector $fkareagerenciasector): self
    {
        $this->fkareagerenciasector = $fkareagerenciasector;

        return $this;
    }

    public function getCodproceso(): ?string
    {
        return $this->codproceso;
    }

    public function setCodproceso(string $codproceso): self
    {
        $this->codproceso = $codproceso;

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
    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(string $objetivo): self
    {
        $this->objetivo = $objetivo;

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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getFechaemision(): ?\DateTimeInterface
    {
        return $this->fechaemision;
    }

    public function setFechaemision(\DateTimeInterface $fechaemision): self
    {
        $this->fechaemision = $fechaemision;
        return $this;
    } 

    public function getEntradasrequeridas(): ?string
    {
        return $this->entradasrequeridas;
    }

    public function setEntradasrequeridas(string $entradasrequeridas): self
    {
        $this->entradasrequeridas = $entradasrequeridas;

        return $this;
    }

    public function getSalidasesperadas(): ?string
    {
        return $this->salidasesperadas;
    }

    public function setSalidasesperadas(string $salidasesperadas): self
    {
        $this->salidasesperadas = $salidasesperadas;
        return $this;
    }

    public function getRecursosnecesarios(): ?string
    {
        return $this->recursosnecesarios;
    }

    public function setRecursosnecesarios(string $recursosnecesarios): self
    {
        $this->recursosnecesarios = $recursosnecesarios;
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
