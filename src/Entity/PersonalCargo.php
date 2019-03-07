<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * PersonalCargo
 * @ORM\Table(name="cb_personal_cargo", indexes={@ORM\Index(name="cb_cargo_fktipo", columns={"cb_cargo_fktipo"})})
 * @ORM\Entity(repositoryClass="App\Repository\PersonalCargoRepository")
 */
class PersonalCargo
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_cargo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_cargo_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_cargo_descripcion", type="string", length=150, nullable=false)
     * @Assert\NotBlank
     */
    private $descripcion;
   
    /**
     * @var int
     *
     * @ORM\Column(name="cb_cargo_estado", type="integer", nullable=false)
     */
    private $estado;

     /**
     * @var \tipocargo
     *
     * @ORM\ManyToOne(targetEntity="TipoCargo")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="cb_cargo_fktipo", referencedColumnName="cb_tipo_cargo_id")
     * })
      * @Assert\NotBlank
     */
    private $fktipo;

   
     /**
     * @var \superior
     *
     * @ORM\ManyToOne(targetEntity="PersonalCargo")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="cb_cargo_fksuperior", referencedColumnName="cb_cargo_id")
     * })
      * @Assert\NotBlank
     */
    private $fksuperior;


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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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

    public function getFktipo(): ?TipoCargo
    {
        return $this->fktipo;
    }

    public function setFktipo(?TipoCargo $fktipo): self
    {
        $this->fktipo = $fktipo;

        return $this;
    }

    public function getFksuperior(): ?PersonalCargo
    {
        return $this->fksuperior;
    }
    
    public function setFksuperior(?PersonalCargo $fksuperior): self
    {
        $this->fksuperior = $fksuperior;

        return $this;
    }
}
