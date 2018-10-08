<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 6:32 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Response;


use stdClass;

class Bolton extends EchargeBaseResponse
{
    protected $id;
    protected $name;
    protected $price;
    protected $isActive;
    protected $isObsolete;
    protected $durationInHours;
    protected $simTypeId;
    protected $operatorId;

    /**
     * Bolton constructor.
     * @param stdClass $object
     */
    function __construct(stdClass $object)
    {
        $this->setParams((array)(get_object_vars($object)));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        if (is_null($this->id)) {
            return $this->params['Id'];
        }
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        if (is_null($this->name)) {
            return $this->params['Name'];
        }
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        if (is_null($this->price)) {
            return $this->params['Price'];
        }
        return $this->price;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        if (is_null($this->isActive)) {
            return $this->params['IsActive'];
        }
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return $this
     */
    public function setIsActive(bool $isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isObsolete(): bool
    {
        if (is_null($this->isObsolete)) {
            return $this->params['IsObsolete'];
        }
        return $this->isObsolete;
    }

    /**
     * @param bool $isObsolete
     * @return $this
     */
    public function setIsObsolete(bool $isObsolete)
    {
        $this->isObsolete = $isObsolete;
        return $this;
    }

    /**
     * @return int
     */
    public function getDurationInHours(): int
    {
        if (is_null($this->durationInHours)) {
            return $this->getParams()['DurationInHours'];
        }
        return $this->durationInHours;
    }

    /**
     * @param int $durationInHours
     * @return $this
     */
    public function setDurationInHours(int $durationInHours)
    {
        $this->durationInHours = $durationInHours;
        return $this;
    }

    /**
     * @return int
     */
    public function getSimTypeId(): int
    {
        if (is_null($this->simTypeId)) {
//            return $this->params['SimTypeId']; // !!!!!!!!! ;)
            return $this->params['SymTypeId']; // !!!!!!!!  ;(
        }
        return $this->simTypeId;
    }

    /**
     * @param int $simTypeId
     * @return $this
     */
    public function setSimTypeId(int $simTypeId)
    {
        $this->simTypeId = $simTypeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperatorId(): int
    {
        if (is_null($this->operatorId)) {
            return $this->params['OperatorId'];
        }
        return $this->operatorId;
    }

    /**
     * @param int $operatorId
     * @return $this
     */
    public function setOperatorId(int $operatorId)
    {
        $this->operatorId = $operatorId;
        return $this;
    }
}