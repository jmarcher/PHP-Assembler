<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 12.05.17
 * Time: 09:03
 */

namespace JMarcher\Assembler\Values;


class NotInitializedValue extends Value implements ValueInterface
{

    /**
     * NotInitializedValue constructor.
     */
    public function __construct()
    {
        $this->value = '@$#%*$*&#@%!';
    }

    public function getValue()
    {
        return $this;
    }

    public function getIntValue()
    {
        return $this;
    }

    public function setValue($value)
    {
        // Do nothing
    }
}