<?php

namespace App\Entity;

use App\Repository\MeInteresaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MeInteresaRepository::class)
 */
class MeInteresa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="meInteresas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Evento::class, inversedBy="meInteresas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evento;

    /**
     * @ORM\Column(type="boolean")
     */
    private $interesa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getEvento(): ?Evento
    {
        return $this->evento;
    }

    public function setEvento(?Evento $evento): self
    {
        $this->evento = $evento;

        return $this;
    }

    public function getInteresa(): ?bool
    {
        return $this->interesa;
    }

    public function setInteresa(bool $interesa): self
    {
        $this->interesa = $interesa;

        return $this;
    }
}
