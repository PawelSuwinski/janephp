<?php

namespace Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\Api\Runtime\Normalizer\CheckArray;
use Docker\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class MountPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Docker\\Api\\Model\\MountPoint';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\Api\\Model\\MountPoint';
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
        $object = new \Docker\Api\Model\MountPoint();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\MountPointConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Source', $data)) {
            $object->setSource($data['Source']);
        }
        if (\array_key_exists('Destination', $data)) {
            $object->setDestination($data['Destination']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
        }
        if (\array_key_exists('Mode', $data)) {
            $object->setMode($data['Mode']);
        }
        if (\array_key_exists('RW', $data)) {
            $object->setRW($data['RW']);
        }
        if (\array_key_exists('Propagation', $data)) {
            $object->setPropagation($data['Propagation']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('source') && null !== $object->getSource()) {
            $data['Source'] = $object->getSource();
        }
        if ($object->isInitialized('destination') && null !== $object->getDestination()) {
            $data['Destination'] = $object->getDestination();
        }
        if ($object->isInitialized('driver') && null !== $object->getDriver()) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('mode') && null !== $object->getMode()) {
            $data['Mode'] = $object->getMode();
        }
        if ($object->isInitialized('rW') && null !== $object->getRW()) {
            $data['RW'] = $object->getRW();
        }
        if ($object->isInitialized('propagation') && null !== $object->getPropagation()) {
            $data['Propagation'] = $object->getPropagation();
        }
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Docker\Api\Validator\MountPointConstraint());
        }
        return $data;
    }
}