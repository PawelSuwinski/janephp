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
class BankMatchVerifyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'CreditSafe\\API\\Model\\BankMatchVerify';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'CreditSafe\\API\\Model\\BankMatchVerify';
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
        $object = new \CreditSafe\API\Model\BankMatchVerify();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('companyNumber', $data)) {
            $object->setCompanyNumber($data['companyNumber']);
            unset($data['companyNumber']);
        }
        if (\array_key_exists('accountNumber', $data)) {
            $object->setAccountNumber($data['accountNumber']);
            unset($data['accountNumber']);
        }
        if (\array_key_exists('iban', $data)) {
            $object->setIban($data['iban']);
            unset($data['iban']);
        }
        if (\array_key_exists('ibanResult', $data)) {
            $object->setIbanResult($data['ibanResult']);
            unset($data['ibanResult']);
        }
        if (\array_key_exists('ibanText', $data)) {
            $object->setIbanText($data['ibanText']);
            unset($data['ibanText']);
        }
        if (\array_key_exists('logDate', $data)) {
            $object->setLogDate($data['logDate']);
            unset($data['logDate']);
        }
        if (\array_key_exists('safeNumber', $data)) {
            $object->setSafeNumber($data['safeNumber']);
            unset($data['safeNumber']);
        }
        if (\array_key_exists('scanResult', $data)) {
            $object->setScanResult($data['scanResult']);
            unset($data['scanResult']);
        }
        if (\array_key_exists('scanText', $data)) {
            $object->setScanText($data['scanText']);
            unset($data['scanText']);
        }
        if (\array_key_exists('sortCode', $data)) {
            $object->setSortCode($data['sortCode']);
            unset($data['sortCode']);
        }
        if (\array_key_exists('statusResult', $data)) {
            $object->setStatusResult($data['statusResult']);
            unset($data['statusResult']);
        }
        if (\array_key_exists('statusText', $data)) {
            $object->setStatusText($data['statusText']);
            unset($data['statusText']);
        }
        if (\array_key_exists('vatResult', $data)) {
            $object->setVatResult($data['vatResult']);
            unset($data['vatResult']);
        }
        if (\array_key_exists('vatText', $data)) {
            $object->setVatText($data['vatText']);
            unset($data['vatText']);
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
        if ($object->isInitialized('companyNumber') && null !== $object->getCompanyNumber()) {
            $data['companyNumber'] = $object->getCompanyNumber();
        }
        if ($object->isInitialized('accountNumber') && null !== $object->getAccountNumber()) {
            $data['accountNumber'] = $object->getAccountNumber();
        }
        if ($object->isInitialized('iban') && null !== $object->getIban()) {
            $data['iban'] = $object->getIban();
        }
        if ($object->isInitialized('ibanResult') && null !== $object->getIbanResult()) {
            $data['ibanResult'] = $object->getIbanResult();
        }
        if ($object->isInitialized('ibanText') && null !== $object->getIbanText()) {
            $data['ibanText'] = $object->getIbanText();
        }
        if ($object->isInitialized('logDate') && null !== $object->getLogDate()) {
            $data['logDate'] = $object->getLogDate();
        }
        if ($object->isInitialized('safeNumber') && null !== $object->getSafeNumber()) {
            $data['safeNumber'] = $object->getSafeNumber();
        }
        if ($object->isInitialized('scanResult') && null !== $object->getScanResult()) {
            $data['scanResult'] = $object->getScanResult();
        }
        if ($object->isInitialized('scanText') && null !== $object->getScanText()) {
            $data['scanText'] = $object->getScanText();
        }
        if ($object->isInitialized('sortCode') && null !== $object->getSortCode()) {
            $data['sortCode'] = $object->getSortCode();
        }
        if ($object->isInitialized('statusResult') && null !== $object->getStatusResult()) {
            $data['statusResult'] = $object->getStatusResult();
        }
        if ($object->isInitialized('statusText') && null !== $object->getStatusText()) {
            $data['statusText'] = $object->getStatusText();
        }
        if ($object->isInitialized('vatResult') && null !== $object->getVatResult()) {
            $data['vatResult'] = $object->getVatResult();
        }
        if ($object->isInitialized('vatText') && null !== $object->getVatText()) {
            $data['vatText'] = $object->getVatText();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}