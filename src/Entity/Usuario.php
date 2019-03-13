<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 * @ORM\Table(name="cb_usuario_usuario", uniqueConstraints={@ORM\UniqueConstraint(name="cb_usuario_id", columns={"cb_usuario_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="cb_usuario_id", type="integer", nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_usuario_nombre", type="string", length=50, nullable=false)
     */
    private $nombre;
     /**
     * @var string
     *
     * @ORM\Column(name="cb_usuario_apellido", type="string", length=50, nullable=false)
     */
    private $apellido;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_usuario_ci", type="integer", nullable=false)
     */
    private $ci;

     /**
     * @var string
     *
     * @ORM\Column(name="cb_usuario_correo", type="string", length=50, nullable=false)
     */
    private $correo;
    /**
     * @var string
     *
     * @ORM\Column(name="cb_usuario_username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="cb_usuario_password", type="string", length=100, nullable=true, unique=true)
     */
    private $password;
    
    /**
     * @var \rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cb_usuario_fkrol", referencedColumnName="cb_rol_id")
     * })
     */
    private $fkrol;

    /**
     * @var int
     *
     * @ORM\Column(name="cb_usuario_estado", type="integer", nullable=false)
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
    public function getCi(): ?int
    {
        return $this->ci;
    }

    public function setCi(int $ci): self
    {
        $this->ci = $ci;

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
    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }   
    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }   
    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }  
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function eraseCredentials() {}

    public function getSalt() {}
    
    public function getRoles() {
        return ['ROLE_USER'];
    } 
    
    public function serialize() {
        return serialize([
            $this->id,
            $this->ci,
            $this->nombre,
            $this->apellido,
            $this->correo,
            $this->username,
            $this->password,
            $this->fkrol,
            $this->estado
        ]);
    } 

    public function unserialize($string){
        list(
            $this->id,
            $this->ci,
            $this->nombre,
            $this->apellido,
            $this->correo,
            $this->username,
            $this->password,
            $this->fkrol,
            $this->estado
        ) = unserialize($string, ['allowed_classes' => false]);
    }
}