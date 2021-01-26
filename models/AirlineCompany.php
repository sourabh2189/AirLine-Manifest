<?php

class AirlineCompany {
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description The name of the carrier for company
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var string
     */
    private $carrierName;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description each company have one headquarter
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var string
     */
    private $headquarters;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description as each company can have multiple airlines, to store the all airlines
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var array
     */
    private $airlines;
    
    
    /**
     * @return string
     */
    public function getCarrierName(): string {
        return $this->carrierName;
    }
    
    /**
     * @param string $carrierName
     */
    public function setCarrierName(string $carrierName): void {
        $this->carrierName = $carrierName;
    }
    
    /**
     * @return string
     */
    public function getHeadquarters(): string {
        return $this->headquarters;
    }
    
    /**
     * @param string $headquarters
     */
    public function setHeadquarters(string $headquarters): void {
        $this->headquarters = $headquarters;
    }
    
    /**
     * @return Airline[]
     */
    public function getAirlines(): array {
        return $this->airlines;
    }
    
    /**
     * @param array $airlines
     */
    public function setAirlines(array $airlines): void {
        $this->airlines = $airlines;
    }
    
    
    public function __construct(string $carrierName, string $headquarters, array $airlines = []) {
        $this->carrierName = $carrierName;
        $this->headquarters = $headquarters;
        $this->airlines = $airlines;
    }
}