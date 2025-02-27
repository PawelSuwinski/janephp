<?php

namespace PicturePark\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use PicturePark\API\Runtime\Normalizer\CheckArray;
use PicturePark\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class OutputRenderedEventNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'PicturePark\\API\\Model\\OutputRenderedEvent';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'PicturePark\\API\\Model\\OutputRenderedEvent';
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
        $object = new \PicturePark\API\Model\OutputRenderedEvent();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('timestamp', $data)) {
            $object->setTimestamp(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['timestamp']));
            unset($data['timestamp']);
        }
        if (\array_key_exists('kind', $data)) {
            $object->setKind($data['kind']);
            unset($data['kind']);
        }
        if (\array_key_exists('outputId', $data) && $data['outputId'] !== null) {
            $object->setOutputId($data['outputId']);
            unset($data['outputId']);
        }
        elseif (\array_key_exists('outputId', $data) && $data['outputId'] === null) {
            $object->setOutputId(null);
        }
        if (\array_key_exists('contentId', $data) && $data['contentId'] !== null) {
            $object->setContentId($data['contentId']);
            unset($data['contentId']);
        }
        elseif (\array_key_exists('contentId', $data) && $data['contentId'] === null) {
            $object->setContentId(null);
        }
        if (\array_key_exists('outputFormatId', $data) && $data['outputFormatId'] !== null) {
            $object->setOutputFormatId($data['outputFormatId']);
            unset($data['outputFormatId']);
        }
        elseif (\array_key_exists('outputFormatId', $data) && $data['outputFormatId'] === null) {
            $object->setOutputFormatId(null);
        }
        if (\array_key_exists('renderingState', $data)) {
            $object->setRenderingState($data['renderingState']);
            unset($data['renderingState']);
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
        $data['timestamp'] = $object->getTimestamp()->format('Y-m-d\\TH:i:sP');
        $data['kind'] = $object->getKind();
        if ($object->isInitialized('outputId') && null !== $object->getOutputId()) {
            $data['outputId'] = $object->getOutputId();
        }
        if ($object->isInitialized('contentId') && null !== $object->getContentId()) {
            $data['contentId'] = $object->getContentId();
        }
        if ($object->isInitialized('outputFormatId') && null !== $object->getOutputFormatId()) {
            $data['outputFormatId'] = $object->getOutputFormatId();
        }
        if ($object->isInitialized('renderingState') && null !== $object->getRenderingState()) {
            $data['renderingState'] = $object->getRenderingState();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}