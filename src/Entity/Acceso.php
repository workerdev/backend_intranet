<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Acceso
 * @ORM\Table(name="cb_usuario_acceso", indexes={@ORM\Index(name="cb_acceso_id", columns={"cb_acceso_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AccesoRepository")
 */
class Acceso
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_acceso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var \rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_acceso_fkrol", referencedColumnName="cb_rol_id")
     * })
     */
    private $fkrol;

    /**
     * @var \modulo
     *
     * @ORM\ManyToOne(targetEntity="Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_acceso_fkmodulo", referencedColumnName="cb_modulo_id")
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

    public function getFkrol(): ?Rol
    {
        return $this->fkrol;
    }

    public function setFkrol(?Rol $fkrol): self
    {
        $this->fkrol = $fkrol;

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
