<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:14
 */

namespace JMarcher\Assembler\Values;


class HexValue extends Value implements ValueInterface
{
    public function getValue()
    {
        return dechex($this->value);
    }

    public function setValue($value)
    {
        $this->value = hexdec($value);
        return $this;
    }

    public function getIntValue()
    {
        return $this->value;
    }
}