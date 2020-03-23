<?php


namespace Born\Restrictions\Model\Data;

use Born\Restrictions\Api\Data\EntityInterface;

class Entity extends \Magento\Framework\Api\AbstractExtensibleObject implements EntityInterface
{

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get firstname
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->_get(self::FIRSTNAME);
    }

    /**
     * Set firstname
     * @param string $firstname
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setFirstname($firstname)
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\Restrictions\Api\Data\EntityExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\Restrictions\Api\Data\EntityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\Restrictions\Api\Data\EntityExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get lastname
     * @return string|null
     */
    public function getLastname()
    {
        return $this->_get(self::LASTNAME);
    }

    /**
     * Set lastname
     * @param string $lastname
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setLastname($lastname)
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * Get company
     * @return string|null
     */
    public function getCompany()
    {
        return $this->_get(self::COMPANY);
    }

    /**
     * Set company
     * @param string $company
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCompany($company)
    {
        return $this->setData(self::COMPANY, $company);
    }

    /**
     * Get street
     * @return string|null
     */
    public function getStreet()
    {
        return $this->_get(self::STREET);
    }

    /**
     * Set street
     * @param string $street
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setStreet($street)
    {
        return $this->setData(self::STREET, $street);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get region
     * @return string|null
     */
    public function getRegion()
    {
        return $this->_get(self::REGION);
    }

    /**
     * Set region
     * @param string $region
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setRegion($region)
    {
        return $this->setData(self::REGION, $region);
    }

    /**
     * Get postalcode
     * @return string|null
     */
    public function getPostalcode()
    {
        return $this->_get(self::POSTALCODE);
    }

    /**
     * Set postalcode
     * @param string $postalcode
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setPostalcode($postalcode)
    {
        return $this->setData(self::POSTALCODE, $postalcode);
    }

    /**
     * Get country
     * @return string|null
     */
    public function getCountry()
    {
        return $this->_get(self::COUNTRY);
    }

    /**
     * Set country
     * @param string $country
     * @return \Born\Restrictions\Api\Data\EntityInterface
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Born\Restriction\Api\Data\SubscriptionsLogInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
