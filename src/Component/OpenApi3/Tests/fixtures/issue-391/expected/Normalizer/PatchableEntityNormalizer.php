<?php

namespace Gounlaf\JanephpBug\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Gounlaf\JanephpBug\Runtime\Normalizer\CheckArray;
use Gounlaf\JanephpBug\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class PatchableEntityNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Gounlaf\\JanephpBug\\Model\\PatchableEntity';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Gounlaf\\JanephpBug\\Model\\PatchableEntity';
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
        $object = new \Gounlaf\JanephpBug\Model\PatchableEntity();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('nullable_property', $data) && $data['nullable_property'] !== null) {
            $object->setNullableProperty($data['nullable_property']);
            unset($data['nullable_property']);
        }
        elseif (\array_key_exists('nullable_property', $data) && $data['nullable_property'] === null) {
            $object->setNullableProperty(null);
        }
        if (\array_key_exists('nullable_and_required_property', $data) && $data['nullable_and_required_property'] !== null) {
            $object->setNullableAndRequiredProperty($data['nullable_and_required_property']);
            unset($data['nullable_and_required_property']);
        }
        elseif (\array_key_exists('nullable_and_required_property', $data) && $data['nullable_and_required_property'] === null) {
            $object->setNullableAndRequiredProperty(null);
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
        if ($object->isInitialized('nullableProperty') && null !== $object->getNullableProperty()) {
            $data['nullable_property'] = $object->getNullableProperty();
        }
        $data['nullable_and_required_property'] = $object->getNullableAndRequiredProperty();
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}