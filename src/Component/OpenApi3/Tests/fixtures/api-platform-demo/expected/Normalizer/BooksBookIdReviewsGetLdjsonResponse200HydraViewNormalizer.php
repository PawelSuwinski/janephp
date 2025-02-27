<?php

namespace ApiPlatform\Demo\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use ApiPlatform\Demo\Runtime\Normalizer\CheckArray;
use ApiPlatform\Demo\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class BooksBookIdReviewsGetLdjsonResponse200HydraViewNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'ApiPlatform\\Demo\\Model\\BooksBookIdReviewsGetLdjsonResponse200HydraView';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'ApiPlatform\\Demo\\Model\\BooksBookIdReviewsGetLdjsonResponse200HydraView';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \ApiPlatform\Demo\Model\BooksBookIdReviewsGetLdjsonResponse200HydraView();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('@id', $data)) {
            $object->setId($data['@id']);
            unset($data['@id']);
        }
        if (\array_key_exists('@type', $data)) {
            $object->setType($data['@type']);
            unset($data['@type']);
        }
        if (\array_key_exists('hydra:first', $data)) {
            $object->setHydraFirst($data['hydra:first']);
            unset($data['hydra:first']);
        }
        if (\array_key_exists('hydra:last', $data)) {
            $object->setHydraLast($data['hydra:last']);
            unset($data['hydra:last']);
        }
        if (\array_key_exists('hydra:previous', $data)) {
            $object->setHydraPrevious($data['hydra:previous']);
            unset($data['hydra:previous']);
        }
        if (\array_key_exists('hydra:next', $data)) {
            $object->setHydraNext($data['hydra:next']);
            unset($data['hydra:next']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['@id'] = $object->getId();
        }
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['@type'] = $object->getType();
        }
        if ($object->isInitialized('hydraFirst') && null !== $object->getHydraFirst()) {
            $data['hydra:first'] = $object->getHydraFirst();
        }
        if ($object->isInitialized('hydraLast') && null !== $object->getHydraLast()) {
            $data['hydra:last'] = $object->getHydraLast();
        }
        if ($object->isInitialized('hydraPrevious') && null !== $object->getHydraPrevious()) {
            $data['hydra:previous'] = $object->getHydraPrevious();
        }
        if ($object->isInitialized('hydraNext') && null !== $object->getHydraNext()) {
            $data['hydra:next'] = $object->getHydraNext();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}