<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**

     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     *   @Assert\Regex(
     *     pattern="/^([0-9]{2}\s){4}[0-9]{2}$/",
     *     match=true,
     *     message="Votre téléphone n'est pas au bon format"
     * )
     * @ORM\Column(type="string", length=14)
     */
    private $telephone;

    /**
     * @ORM\Column(type="date")
     */
    private $dateHeureContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateHeureContact(): ?\DateTimeInterface
    {
        return $this->dateHeureContact;
    }

    public function setDateHeureContact(\DateTimeInterface $dateHeureContact): self
    {
        $this->dateHeureContact = $dateHeureContact;

        return $this;
    }
}
