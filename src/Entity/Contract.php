<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ContractRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContractRepository::class)]
// #[ApiResource]
class Contract
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $contract_number = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_of_issue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $effective_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $due_date = null;

    #[ORM\Column]
    private ?float $net_prime = null;

    #[ORM\Column]
    private ?float $ttc_prime = null;

    #[ORM\Column]
    private ?float $tax = null;

    #[ORM\Column]
    private ?float $accessory = null;

    #[ORM\Column(nullable: true)]
    private ?float $automobile_guarantee_fund = null;

    #[ORM\OneToOne(inversedBy: 'contract', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client_id = null;

    #[ORM\ManyToOne(inversedBy: 'contracts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Company $company_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContractNumber(): ?string
    {
        return $this->contract_number;
    }

    public function setContractNumber(string $contract_number): static
    {
        $this->contract_number = $contract_number;

        return $this;
    }

    public function getDateOfIssue(): ?\DateTimeInterface
    {
        return $this->date_of_issue;
    }

    public function setDateOfIssue(\DateTimeInterface $date_of_issue): static
    {
        $this->date_of_issue = $date_of_issue;

        return $this;
    }

    public function getEffectiveDate(): ?\DateTimeInterface
    {
        return $this->effective_date;
    }

    public function setEffectiveDate(\DateTimeInterface $effective_date): static
    {
        $this->effective_date = $effective_date;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->due_date;
    }

    public function setDueDate(\DateTimeInterface $due_date): static
    {
        $this->due_date = $due_date;

        return $this;
    }

    public function getNetPrime(): ?float
    {
        return $this->net_prime;
    }

    public function setNetPrime(float $net_prime): static
    {
        $this->net_prime = $net_prime;

        return $this;
    }

    public function getTtcPrime(): ?float
    {
        return $this->ttc_prime;
    }

    public function setTtcPrime(float $ttc_prime): static
    {
        $this->ttc_prime = $ttc_prime;

        return $this;
    }

    public function getTax(): ?float
    {
        return $this->tax;
    }

    public function setTax(float $tax): static
    {
        $this->tax = $tax;

        return $this;
    }

    public function getAccessory(): ?float
    {
        return $this->accessory;
    }

    public function setAccessory(float $accessory): static
    {
        $this->accessory = $accessory;

        return $this;
    }

    public function getAutomobileGuaranteeFund(): ?float
    {
        return $this->automobile_guarantee_fund;
    }

    public function setAutomobileGuaranteeFund(?float $automobile_guarantee_fund): static
    {
        $this->automobile_guarantee_fund = $automobile_guarantee_fund;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(Client $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getCompanyId(): ?Company
    {
        return $this->company_id;
    }

    public function setCompanyId(?Company $company_id): static
    {
        $this->company_id = $company_id;

        return $this;
    }
}
