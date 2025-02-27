<?php

namespace CreditSafe\API\Model;

class GbPeopleReportReponseReportDirectorshipsPreviousItem extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string
     */
    protected $companyName;
    /**
     * 
     *
     * @var string
     */
    protected $companyRegistrationNumber;
    /**
     * 
     *
     * @var string
     */
    protected $status;
    /**
     * 
     *
     * @var GbPeopleReportReponseReportDirectorshipsPreviousItemPosition
     */
    protected $position;
    /**
     * 
     *
     * @var string
     */
    protected $companyRegistrationDate;
    /**
     * 
     *
     * @var GbPeopleReportReponseReportDirectorshipsPreviousItemLatestTurnoverFigure
     */
    protected $latestTurnoverFigure;
    /**
     * 
     *
     * @var GbPeopleReportReponseReportDirectorshipsPreviousItemNetWorth
     */
    protected $netWorth;
    /**
     * 
     *
     * @var int
     */
    protected $legalCount;
    /**
     * 
     *
     * @var GbPeopleReportReponseReportDirectorshipsPreviousItemCreditScore
     */
    protected $creditScore;
    /**
     * 
     *
     * @var GbPeopleReportReponseReportDirectorshipsPreviousItemAdditionalData
     */
    protected $additionalData;
    /**
     * 
     *
     * @return string
     */
    public function getCompanyName() : string
    {
        return $this->companyName;
    }
    /**
     * 
     *
     * @param string $companyName
     *
     * @return self
     */
    public function setCompanyName(string $companyName) : self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getCompanyRegistrationNumber() : string
    {
        return $this->companyRegistrationNumber;
    }
    /**
     * 
     *
     * @param string $companyRegistrationNumber
     *
     * @return self
     */
    public function setCompanyRegistrationNumber(string $companyRegistrationNumber) : self
    {
        $this->initialized['companyRegistrationNumber'] = true;
        $this->companyRegistrationNumber = $companyRegistrationNumber;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }
    /**
     * 
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status) : self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * 
     *
     * @return GbPeopleReportReponseReportDirectorshipsPreviousItemPosition
     */
    public function getPosition() : GbPeopleReportReponseReportDirectorshipsPreviousItemPosition
    {
        return $this->position;
    }
    /**
     * 
     *
     * @param GbPeopleReportReponseReportDirectorshipsPreviousItemPosition $position
     *
     * @return self
     */
    public function setPosition(GbPeopleReportReponseReportDirectorshipsPreviousItemPosition $position) : self
    {
        $this->initialized['position'] = true;
        $this->position = $position;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getCompanyRegistrationDate() : string
    {
        return $this->companyRegistrationDate;
    }
    /**
     * 
     *
     * @param string $companyRegistrationDate
     *
     * @return self
     */
    public function setCompanyRegistrationDate(string $companyRegistrationDate) : self
    {
        $this->initialized['companyRegistrationDate'] = true;
        $this->companyRegistrationDate = $companyRegistrationDate;
        return $this;
    }
    /**
     * 
     *
     * @return GbPeopleReportReponseReportDirectorshipsPreviousItemLatestTurnoverFigure
     */
    public function getLatestTurnoverFigure() : GbPeopleReportReponseReportDirectorshipsPreviousItemLatestTurnoverFigure
    {
        return $this->latestTurnoverFigure;
    }
    /**
     * 
     *
     * @param GbPeopleReportReponseReportDirectorshipsPreviousItemLatestTurnoverFigure $latestTurnoverFigure
     *
     * @return self
     */
    public function setLatestTurnoverFigure(GbPeopleReportReponseReportDirectorshipsPreviousItemLatestTurnoverFigure $latestTurnoverFigure) : self
    {
        $this->initialized['latestTurnoverFigure'] = true;
        $this->latestTurnoverFigure = $latestTurnoverFigure;
        return $this;
    }
    /**
     * 
     *
     * @return GbPeopleReportReponseReportDirectorshipsPreviousItemNetWorth
     */
    public function getNetWorth() : GbPeopleReportReponseReportDirectorshipsPreviousItemNetWorth
    {
        return $this->netWorth;
    }
    /**
     * 
     *
     * @param GbPeopleReportReponseReportDirectorshipsPreviousItemNetWorth $netWorth
     *
     * @return self
     */
    public function setNetWorth(GbPeopleReportReponseReportDirectorshipsPreviousItemNetWorth $netWorth) : self
    {
        $this->initialized['netWorth'] = true;
        $this->netWorth = $netWorth;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getLegalCount() : int
    {
        return $this->legalCount;
    }
    /**
     * 
     *
     * @param int $legalCount
     *
     * @return self
     */
    public function setLegalCount(int $legalCount) : self
    {
        $this->initialized['legalCount'] = true;
        $this->legalCount = $legalCount;
        return $this;
    }
    /**
     * 
     *
     * @return GbPeopleReportReponseReportDirectorshipsPreviousItemCreditScore
     */
    public function getCreditScore() : GbPeopleReportReponseReportDirectorshipsPreviousItemCreditScore
    {
        return $this->creditScore;
    }
    /**
     * 
     *
     * @param GbPeopleReportReponseReportDirectorshipsPreviousItemCreditScore $creditScore
     *
     * @return self
     */
    public function setCreditScore(GbPeopleReportReponseReportDirectorshipsPreviousItemCreditScore $creditScore) : self
    {
        $this->initialized['creditScore'] = true;
        $this->creditScore = $creditScore;
        return $this;
    }
    /**
     * 
     *
     * @return GbPeopleReportReponseReportDirectorshipsPreviousItemAdditionalData
     */
    public function getAdditionalData() : GbPeopleReportReponseReportDirectorshipsPreviousItemAdditionalData
    {
        return $this->additionalData;
    }
    /**
     * 
     *
     * @param GbPeopleReportReponseReportDirectorshipsPreviousItemAdditionalData $additionalData
     *
     * @return self
     */
    public function setAdditionalData(GbPeopleReportReponseReportDirectorshipsPreviousItemAdditionalData $additionalData) : self
    {
        $this->initialized['additionalData'] = true;
        $this->additionalData = $additionalData;
        return $this;
    }
}