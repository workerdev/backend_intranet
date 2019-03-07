<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Modulo
 * @ORM\Table(name="cb_usuario_modulo", indexes={@ORM\Index(name="cb_modulo_id", columns={"cb_modulo_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ModuloRepository")
 */
class Modulo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_modulo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_modulo_nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_modulo_titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

      /**
     * @var string
     *
     * @ORM\Column(name="cb_modulo_ruta", type="string", length=100, nullable=true)
     */
    private $ruta;

      /**
     * @var string
     *
     * @ORM\Column(name="cb_modulo_icono", type="string", length=50, nullable=false)
     */
    private $icono;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_modulo_menu", type="integer", nullable=false)
     */
    
    private $menu;


     /**
     * @var \modulo
     *
     * @ORM\ManyToOne(targetEntity="Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_modulo_fkmodulo", referencedColumnName="cb_modulo_id")
     * })
     */
    private $fkmodulo;    


    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(string $id): self
    {
        $this->id = $id;

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getRuta(): ?string
    {
        return $this->ruta;
    }

    public function setRuta(string $ruta): self
    {
        $this->ruta = $ruta;

        return $this;
    }

    public function getIcono(): ?string
    {
        return $this->icono;
    }

    public function setIcono(string $icono): self
    {
        $this->icono = $icono;

        return $this;
    }

    public function getMenu(): ?int
    {
        return $this->menu;
    }

    public function setMenu(int $menu): self
    {
        $this->menu = $menu;

        return $this;
    }
    
    public function getFkmodulo(): ?Modulo
    {
        return $this->fkmodulo;
    }

    public function setFkmodulo(?Modulo $fkmodulo): self
    {
        $this->fkmodulo = $fkmodulo;

        return $this;
    }
}
