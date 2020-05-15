<?php
namespace App\Service\Transformer;

use JMS\Serializer\SerializerBuilder;
use App\Service\Transformer\ITransformer;

class TransformerService implements ITransformer
{
    /**
     * Transform array of entities to array of stdclass (better to printout)
     * @param array $object contain an entity of any type
     * @return \Stclass[]
     *
     */

    public function transform($object)
    {
        $serializer = SerializerBuilder::create()->build();
        $json = $serializer->serialize($object, 'json');
        return json_decode($json);
    }

}