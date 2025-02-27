<?php

namespace Jane\Component\OpenApi3\Tests\Expected\Normalizer;

use Jane\Component\OpenApi3\Tests\Expected\Runtime\Normalizer\CheckArray;
use Jane\Component\OpenApi3\Tests\Expected\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = array('Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint1GetResponse' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint1GetResponseNormalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint1PostBody' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint1PostBodyNormalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint2GetResponse200' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint2GetResponse200Normalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint2PostBody' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint2PostBodyNormalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint3GetResponse200' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint3GetResponse200Normalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint3GetResponse200Field3' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint3GetResponse200Field3Normalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint3PostBody' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint3PostBodyNormalizer', 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Model\\Endpoint3PostBodyPostField3' => 'Jane\\Component\\OpenApi3\\Tests\\Expected\\Normalizer\\Endpoint3PostBodyPostField3Normalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Jane\\Component\\OpenApi3\\Tests\\Expected\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}