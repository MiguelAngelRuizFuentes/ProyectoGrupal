<?php

namespace App\Entity;

use App\Repository\ListaCorreoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListaCorreoRepository::class)
 */
class ListaCorreo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $correos = [];

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="listaCorreos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreos(): ?array
    {
        return $this->correos;
    }

    public function setCorreos(array $correos): self
    {
        $this->correos = $correos;

        return $this;
    }

    public function getAutor(): ?User
    {
        return $this->autor;
    }

    public function setAutor(?User $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
}
