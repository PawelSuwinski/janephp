<?php

namespace Jane\OpenApi3\Tests\Expected\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Jane\OpenApi3\Tests\Expected\Runtime\Normalizer\CheckArray;
use Jane\OpenApi3\Tests\Expected\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TweetLookupResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Jane\\OpenApi3\\Tests\\Expected\\Model\\TweetLookupResponse';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Jane\\OpenApi3\\Tests\\Expected\\Model\\TweetLookupResponse';
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
        $object = new \Jane\OpenApi3\Tests\Expected\Model\TweetLookupResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('data', $data)) {
            $values = array();
            foreach ($data['data'] as $value) {
                $values[] = $value;
            }
            $object->setData($values);
            unset($data['data']);
        }
        if (\array_key_exists('includes', $data)) {
            $object->setIncludes($this->denormalizer->denormalize($data['includes'], 'Jane\\OpenApi3\\Tests\\Expected\\Model\\Expansions', 'json', $context));
            unset($data['includes']);
        }
        if (\array_key_exists('errors', $data)) {
            $values_1 = array();
            foreach ($data['errors'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setErrors($values_1);
            unset($data['errors']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        if ($object->isInitialized('data') && null !== $object->getData()) {
            $values = array();
            foreach ($object->getData() as $value) {
                $values[] = $value;
            }
            $data['data'] = $values;
        }
        if ($object->isInitialized('includes') && null !== $object->getIncludes()) {
            $data['includes'] = $this->normalizer->normalize($object->getIncludes(), 'json', $context);
        }
        if ($object->isInitialized('errors') && null !== $object->getErrors()) {
            $values_1 = array();
            foreach ($object->getErrors() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['errors'] = $values_1;
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}