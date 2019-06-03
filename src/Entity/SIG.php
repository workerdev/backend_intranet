<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SIG
 * @ORM\Table(name="cb_cfg_sig", indexes={@ORM\Index(name="cb_sig_id", columns={"cb_sig_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\SIGRepository")
 */
class SIG
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_sig_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_sig_titulo", type="text", nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_sig_ruta", type="string", length=150, nullable=false)
     */
    private $ruta;
    
    /**
     * @var \superior
     *
     * @ORM\ManyToOne(targetEntity="SIG")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_sig_fksuperior", referencedColumnName="cb_sig_id",nullable=true)
     * })
     */
    private $fksuperior;
     
    /**
     * @var int
     *
     * @ORM\Column(name="cb_sig_estado", type="integer", nullable=false)
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

    public function gettitulo(): ?string
    {
        return $this->titulo;
    }

    public function settitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }  

    public function getFksuperior(): ?SIG
    {
        return $this->fksuperior;
    }

    public function setFksuperior(?SIG $fksuperior): self
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