<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * PurchaseInvoice
 *
 * @ORM\Table(name="purchase_invoice")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\PurchaseInvoiceRepository")
 * @Vich\Uploadable
 */
class PurchaseInvoice
{
    /**

     *
     * @var File
     *
     *  @Vich\UploadableField(mapping="file", fileNameProperty="embeddedFile.name", size="embeddedFile.size", mimeType="embeddedFile.mimeType", originalName="embeddedFile.originalName")
     */
    private $file;

    /**
     * @var EmbeddedFile
     *
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     */
    private $embeddedFile;


    /**
     * @return File|null
     */

    public function getFile(): ?File
    {
        return $this->file;
    }


    /**
     * @param File|UploadedFile $file
     * @return PurchaseInvoice
     */

    public function setFile(File $file = null): PurchaseInvoice
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return EmbeddedFile
     */

    public function getEmbeddedFile(): EmbeddedFile
    {
        return $this->embeddedFile;
    }

    /**
     * @param EmbeddedFile $embeddedFile
     * @return Document
     */
    public function setEmbeddedFile(EmbeddedFile $embeddedFile): PurchaseInvoice
    {
        $this->embeddedFile = $embeddedFile;
        return $this;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var integer
     *
     * @ORM\Column(name="file_id", type="integer")
     */
    private $fileId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_id", type="integer")
     */
    private $taxId;


    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_netto", type="integer")
     */
    private $amountNetto;

    /**
     * @var float
     *
     * @ORM\Column(name="amount_netto_currency", type="float", precision=10, scale=0, nullable=true)
     */
    private $amountNettoCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=20, nullable=true)
     */
    private $currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_brutto", type="integer")
     */
    private $amountBrutto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="MMBundle\Entity\Equipment", mappedBy="invoice")
     */
    private $equipments;

    /**
     * @ORM\ManyToOne(targetEntity="MMBundle\Entity\Contractor", inversedBy="invoice")
     */
    protected $contractors;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Data", type="date")
     */
    private $data;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->embeddedFile = new EmbeddedFile();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fileId
     *
     * @param integer $fileId
     *
     * @return PurchaseInvoice
     */


    /**
     * Set data
     *
     * @param \DateTime $data
     *
     * @return PurchaseInvoice
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }



    public function setFileId($fileId)
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * Get fileId
     *
     * @return integer
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Set taxId
     *
     * @param integer $taxId
     *
     * @return PurchaseInvoice
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;

        return $this;
    }

    /**
     * Get taxId
     *
     * @return integer
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * Set number
     *
     * @param integer $number
     *
     * @return PurchaseInvoice
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set amountNetto
     *
     * @param integer $amountNetto
     *
     * @return PurchaseInvoice
     */
    public function setAmountNetto($amountNetto)
    {
        $this->amountNetto = $amountNetto;

        return $this;
    }

    /**
     * Get amountNetto
     *
     * @return integer
     */
    public function getAmountNetto()
    {
        return $this->amountNetto;
    }

    /**
     * Set amountNettoCurrency
     *
     * @param float $amountNettoCurrency
     *
     * @return PurchaseInvoice
     */
    public function setAmountNettoCurrency($amountNettoCurrency)
    {
        $this->amountNettoCurrency = $amountNettoCurrency;

        return $this;
    }

    /**
     * Get amountNettoCurrency
     *
     * @return float
     */
    public function getAmountNettoCurrency()
    {
        return $this->amountNettoCurrency;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return PurchaseInvoice
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set amountBrutto
     *
     * @param integer $amountBrutto
     *
     * @return PurchaseInvoice
     */
    public function setAmountBrutto($amountBrutto)
    {
        $this->amountBrutto = $amountBrutto;

        return $this;
    }

    /**
     * Get amountBrutto
     *
     * @return integer
     */
    public function getAmountBrutto()
    {
        return $this->amountBrutto;
    }

    /**
     * Add equipment
     *
     * @param \MMBundle\Entity\Equipment $equipment
     *
     * @return PurchaseInvoice
     */
    public function addEquipment(\MMBundle\Entity\Equipment $equipment)
    {
        $this->equipments[] = $equipment;

        return $this;
    }

    /**
     * Remove equipment
     *
     * @param \MMBundle\Entity\Equipment $equipment
     */
    public function removeEquipment(\MMBundle\Entity\Equipment $equipment)
    {
        $this->equipments->removeElement($equipment);
    }

    /**
     * Get equipments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    /**
     * Set contractors
     *
     * @param \MMBundle\Entity\Contractor $contractors
     *
     * @return PurchaseInvoice
     */

    public function setContractors(\MMBundle\Entity\Contractor $contractors = null)
    {
        $this->contractors = $contractors;

        return $this;
    }

    /**
     * Get contractors
     *
     * @return \MMBundle\Entity\Contractor
     */
    public function getContractors()
    {
        return $this->contractors;
    }

}
