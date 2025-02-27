<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Github\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class PackagesBillingUsageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'Github\\Model\\PackagesBillingUsage';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'Github\\Model\\PackagesBillingUsage';
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
        $object = new \Github\Model\PackagesBillingUsage();
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Github\Validator\PackagesBillingUsageConstraint());
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('total_gigabytes_bandwidth_used', $data)) {
            $object->setTotalGigabytesBandwidthUsed($data['total_gigabytes_bandwidth_used']);
            unset($data['total_gigabytes_bandwidth_used']);
        }
        if (\array_key_exists('total_paid_gigabytes_bandwidth_used', $data)) {
            $object->setTotalPaidGigabytesBandwidthUsed($data['total_paid_gigabytes_bandwidth_used']);
            unset($data['total_paid_gigabytes_bandwidth_used']);
        }
        if (\array_key_exists('included_gigabytes_bandwidth', $data)) {
            $object->setIncludedGigabytesBandwidth($data['included_gigabytes_bandwidth']);
            unset($data['included_gigabytes_bandwidth']);
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
        if ($object->isInitialized('totalGigabytesBandwidthUsed') && null !== $object->getTotalGigabytesBandwidthUsed()) {
            $data['total_gigabytes_bandwidth_used'] = $object->getTotalGigabytesBandwidthUsed();
        }
        if ($object->isInitialized('totalPaidGigabytesBandwidthUsed') && null !== $object->getTotalPaidGigabytesBandwidthUsed()) {
            $data['total_paid_gigabytes_bandwidth_used'] = $object->getTotalPaidGigabytesBandwidthUsed();
        }
        if ($object->isInitialized('includedGigabytesBandwidth') && null !== $object->getIncludedGigabytesBandwidth()) {
            $data['included_gigabytes_bandwidth'] = $object->getIncludedGigabytesBandwidth();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        if (!($context['skip_validation'] ?? false)) {
            $this->validate($data, new \Github\Validator\PackagesBillingUsageConstraint());
        }
        return $data;
    }
}