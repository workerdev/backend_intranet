<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * TipoDatoEmpresarial
 * @ORM\Table(name="cb_cfg_tipodatoemp", uniqueConstraints={@ORM\UniqueConstraint(name="cb_tipodatoempresarial_nombre", columns={"cb_tipodatoempresarial_nombre"})})
 * @ORM\Entity(repositoryClass="App\Repository\TipoDatoEmpresarialRepository")
 * @UniqueEntity(fields = "nombre", message="Este valor ya se encuentra registrado")
 */
class TipoDatoEmpresarial
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipodatoempresarial_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_tipodatoempresarial_nombre", type="string", length=50, nullable=false)
     * @Assert\NotBlank
     */
    private $nombre;

   
    

    /**
     * @var int
     *
     * @ORM\Column(name="cb_tipodatoempresarial_estado", type="integer", nullable=false)
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
  

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

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
}
