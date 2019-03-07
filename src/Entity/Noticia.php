<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Noticia
 * @ORM\Table(name="cb_comunicacion_noticia", uniqueConstraints={@ORM\UniqueConstraint(name="cb_noticias_id", columns={"cb_noticia_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\NoticiaRepository")
 */
class Noticia
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_noticia_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_noticia_titulo", type="string", length=500, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_noticia_subtitulo", type="string", length=500, nullable=true)
     */
    private $subtitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_noticia_contenido", type="text", nullable=false)
     */
    private $contenido;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cb_noticia_tipo", type="string", length=50, nullable=false)
     */
    private $tipo;
    
    /**
    * @var date
    *
    * @ORM\Column(name="cb_noticia_fecha", type="date", nullable=false)
    */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_noticia_estado", type="integer", nullable=false)
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
    
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }
    
    public function getSubtitulo(): ?string
    {
        return $this->subtitulo;
    }

    public function setSubtitulo(string $subtitulo): self
    {
        $this->subtitulo = $subtitulo;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }
    
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }
    
    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
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
