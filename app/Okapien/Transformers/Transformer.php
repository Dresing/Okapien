<?php
/**
 * Implementation by:
 *
 * Name: Andreas Staurby Olesen
 * Date: 29/01-2017
 */
namespace App\Okapien\Transformers;

abstract class Transformer{

    /**
     * Takes an array of items and calls and implementation which will
     * transform the mapping.
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items){
        return array_map([$this, 'transform'], $items);
    }

    /**
     * The implementation should transform a single Eloquent item
     * such that a response from the API only expose the desired column names
     * and may hide others.
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

}