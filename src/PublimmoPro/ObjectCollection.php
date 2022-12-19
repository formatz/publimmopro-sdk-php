<?php

namespace PublimmoPro;

class ObjectCollection
{
    /** @var array $objects List of objects */
    private $objects;

    /** @var int $total Number of results found */
    private $total;
    
    public function __construct(array $objects, int $total)
    {
        $this->objects = $objects;
        $this->total = $total;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function get()
    {
        return $this->objects;
    }

    /**
     * Filter by including or excluding a list of object id
     *
     * @param  string  $filter_type        include or exlcude
     * @param  mixed   $objects_to_filter  list of objects to filter
     *
     * @return mixed                       false or ObjectCollection
     */
    public function filter(string $filter_type, $objects_to_filter)
    {
        if (empty($objects_to_filter)){
            return false;
        }

        // allow to input an unique id
        if (!is_array($objects_to_filter)) {
            $objects_to_filter = [$objects_to_filter];
        }

        $objects_to_filter = array_filter($objects_to_filter, 'is_numeric');

        if (count($objects_to_filter) <= 0){
            return false;
        }

        foreach ($this->objects as $k => $pi_object) {
            if ($filter_type == 'include'){
                if (!in_array($pi_object->id, $objects_to_filter)){
                    unset($this->objects[$k]);
                }
            } elseif ($filter_type == 'exclude') {
                if (in_array($pi_object->id, $objects_to_filter)){
                    unset($this->objects[$k]);
                }
            }
        }

        // resets the keys, otherwise, pagination is wrong
        $this->objects = array_values($this->objects);

        return $this;
    }

    /**
     * Sort objects using a set of instructions
     *
     * @param  mixed  $instructions  list of key value sort instructions
     *
     * @return mixed                 false or ObjectCollection
     */
    public function sort($instructions)
    {
        if (empty($instructions)) {
            return false;
        }


        // allow to input an unique instruction as a string
        if (!is_array($instructions)) {
            $instructions = [$instructions];
        }

        $lines = array_map('trim', $instructions);

        $instructions = array_map(function($instruction) {
            list($field, $direction, $type) = explode(':', $instruction);

            if (!in_array($direction, ['asc', 'desc'])) {
                throw new \InvalidArgumentException('Direction instruction should be one of "asc" or "desc"');
            }

            return compact('field', 'direction', 'type');
        }, $lines);

        usort($this->objects, function ($a, $b) use ($instructions) {
            $t = array(true => -1, false => 1);
            $r = true;
            $k = 1;

            foreach ($instructions as $key => $rule) {
                $aVal = $a->{$rule['field']} ?? '';
                $bVal = $b->{$rule['field']} ?? '';

                if ($rule['type'] == 'integer') {
                    $aVal = filter_var(rtrim($aVal, '-'), FILTER_SANITIZE_NUMBER_INT);
                    $bVal = filter_var(rtrim($bVal, '-'), FILTER_SANITIZE_NUMBER_INT);
                }

                $k = ($rule['direction'] == 'asc') ? 1 : -1;
                $r = ($aVal < $bVal);

                if ($aVal !== $bVal) {
                    return $t[$r] * $k;
                }

            }

            return $t[$r] * $k;
        });

        return $this;
    }
}

