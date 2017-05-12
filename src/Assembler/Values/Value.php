<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:26
 */

namespace JMarcher\Assembler\Values;


abstract class Value implements ValueInterface
{
    protected const LOW_VALUE_SUBPOS = -8;
    protected const LOW_VALUE_SIZE = 8;
    protected const MAX_X_SIZE = 16;
    protected const MAX_VALUE_SIZE = 32;
    /**
     * @var int
     */
    protected $value;

    public function __construct()
    {
        // Add garbage to value
        $this->value = new NotInitializedValue;
    }

    public function setLowValue($value)
    {
        $binaryValue = (new BinaryValue)->create($this);
        $translatedValue = (new BinaryValue)->create((new static)->setValue($value));
        $newValue = substr_replace($binaryValue->getValue(), $translatedValue->getValue(), self::LOW_VALUE_SUBPOS);
        $this->setValue(((new static)->create((new IntValue)->create($binaryValue->setValue($newValue))))->getValue());
    }

    public function create(ValueInterface $value): ValueInterface
    {
        $this->value = $value->getIntValue();

        return $this;
    }

    public function setHighValue($value)
    {
        $binaryValue = (new BinaryValue)->create($this);
        $translatedValue = (new BinaryValue)->create((new static)->setValue($value));
        $newValue = substr_replace($binaryValue->getValue(), $translatedValue->getValue(), self::LOW_VALUE_SUBPOS * 2,
            self::LOW_VALUE_SIZE);
        $this->setValue(((new static)->create((new IntValue)->create($binaryValue->setValue($newValue))))->getValue());
    }

    public function setXValue($value)
    {
        // TODO: Implement setXValue() method.
    }


}