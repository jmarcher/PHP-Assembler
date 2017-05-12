<?php
/**
 * Created by Joaquín Marcher.
 * User: jmarcher
 * Date: 11.05.17
 * Time: 10:17
 */

namespace JMarcher\Assembler;


use Illuminate\Support\Collection;
use JMarcher\Assembler\Values\ValueInterface;

class Memory
{
    /**
     * @var Collection
     */
    protected $memory;

    /**
     * Memory constructor.
     */
    public function __construct()
    {
        $this->memory = new Collection([]);
    }

    /**
     * If the Address starts with 'E', we can either replace the register or insert it if it was not there
     * (Should we initialize the registers?)
     * If registers do NOT start with 'E', we need to check if either end with 'L'(low) or 'H'(high) and replace the
     * correspondent piece of the register.
     *
     * @param string         $address
     * @param ValueInterface $value
     * @return $this
     */
    public function move(string $address, ValueInterface $value)
    {
        $existingRecord = $this->getExistingRecord($address);
        if (! is_null($existingRecord)) {
            $existingRecord->setValue($value);

            return $this;
        }
        $register = (new Register($address))->setValue($value);
        $this->memory->push($register);

        return $this;
    }

    /**
     * @param string $address
     * @return mixed
     */
    protected function getExistingRecord(string $address): ?Register
    {
        $positionInMemory = $this->memory->search(function (Register $element) use ($address) {
            return $element->getAddress() === $address;
        });
        if ($positionInMemory === false) {
            return null;
        }

        return $this->memory->get($positionInMemory);
    }

    function __toString()
    {
        $result = $this->memory->reduce(function ($carry, $register) {
            return $register . ';' . $carry;
        }, '');

        return $result;
    }


}