<?php

namespace CreditSafe\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use CreditSafe\API\Runtime\Normalizer\CheckArray;
use CreditSafe\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class GbCompanyReportExampleResponseReportLocalFinancialStatementsItemOtherFinancialsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'CreditSafe\\API\\Model\\GbCompanyReportExampleResponseReportLocalFinancialStatementsItemOtherFinancials';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'CreditSafe\\API\\Model\\GbCompanyReportExampleResponseReportLocalFinancialStatementsItemOtherFinancials';
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
        $object = new \CreditSafe\API\Model\GbCompanyReportExampleResponseReportLocalFinancialStatementsItemOtherFinancials();
        if (\array_key_exists('bankOverdraftAndLTL', $data) && \is_int($data['bankOverdraftAndLTL'])) {
            $data['bankOverdraftAndLTL'] = (double) $data['bankOverdraftAndLTL'];
        }
        if (\array_key_exists('workingCapital', $data) && \is_int($data['workingCapital'])) {
            $data['workingCapital'] = (double) $data['workingCapital'];
        }
        if (\array_key_exists('capitalEmployed', $data) && \is_int($data['capitalEmployed'])) {
            $data['capitalEmployed'] = (double) $data['capitalEmployed'];
        }
        if (\array_key_exists('netWorth', $data) && \is_int($data['netWorth'])) {
            $data['netWorth'] = (double) $data['netWorth'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('contingentLiabilities', $data)) {
            $object->setContingentLiabilities($data['contingentLiabilities']);
            unset($data['contingentLiabilities']);
        }
        if (\array_key_exists('bankOverdraftAndLTL', $data)) {
            $object->setBankOverdraftAndLTL($data['bankOverdraftAndLTL']);
            unset($data['bankOverdraftAndLTL']);
        }
        if (\array_key_exists('workingCapital', $data)) {
            $object->setWorkingCapital($data['workingCapital']);
            unset($data['workingCapital']);
        }
        if (\array_key_exists('capitalEmployed', $data)) {
            $object->setCapitalEmployed($data['capitalEmployed']);
            unset($data['capitalEmployed']);
        }
        if (\array_key_exists('netWorth', $data)) {
            $object->setNetWorth($data['netWorth']);
            unset($data['netWorth']);
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
        if ($object->isInitialized('contingentLiabilities') && null !== $object->getContingentLiabilities()) {
            $data['contingentLiabilities'] = $object->getContingentLiabilities();
        }
        if ($object->isInitialized('bankOverdraftAndLTL') && null !== $object->getBankOverdraftAndLTL()) {
            $data['bankOverdraftAndLTL'] = $object->getBankOverdraftAndLTL();
        }
        if ($object->isInitialized('workingCapital') && null !== $object->getWorkingCapital()) {
            $data['workingCapital'] = $object->getWorkingCapital();
        }
        if ($object->isInitialized('capitalEmployed') && null !== $object->getCapitalEmployed()) {
            $data['capitalEmployed'] = $object->getCapitalEmployed();
        }
        if ($object->isInitialized('netWorth') && null !== $object->getNetWorth()) {
            $data['netWorth'] = $object->getNetWorth();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}