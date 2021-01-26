<?php

class Passenger {
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description First name of the passenger acc to requirements
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var string
     */
    private $firstName;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description Last name of the passenger acc to requirements
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var string
     */
    private $lastName;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description Age of passenger
     * -----------------------------------------------------------------------------------------------------------------
     * @var int
     */
    private $age;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description to store the gender
     * current available genders are
     * male, female, other
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @var string
     */
    private $gender;
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description To store the passenger's current airline company selected
     * -----------------------------------------------------------------------------------------------------------------
     * @var AirlineCompany
     */
    private $currentAirlineCompany;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description To store the passenger's current airline company selected
     * -----------------------------------------------------------------------------------------------------------------
     * @var Airline
     */
    private $currentAirline;
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description To store the passenger's current airline company selected
     * -----------------------------------------------------------------------------------------------------------------
     * @var SeatConfiguration
     */
    private $currentSeat;
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description To store if the user has checked in to flight or not
     * -----------------------------------------------------------------------------------------------------------------
     * @var bool
     */
    private $isCheckIn;
    
    public function __construct(string $firstName, string $lastName, int $age, string $gender, AirlineCompany $airlineCompany, Airline $airline, SeatConfiguration $seat, bool $checkedIn = false) {


        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setAge($age);
        $this->setGender($gender);
        $this->setCurrentAirlineCompany($airlineCompany);
        $this->setCurrentAirline($airline);
        $this->setCurrentSeat($seat);
        $this->setIsCheckIn($checkedIn);
    }
    
    /**
     * @return string
     */
    public function getFirstName(): string {
        return ucwords($this->firstName);
    }
    
    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = strtolower($firstName);
    }
    
    /**
     * @return string
     */
    public function getLastName(): string {
        return ucwords($this->lastName);
    }
    
    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void {
        $this->lastName = strtolower($lastName);
    }
    
    /**
     * @return int
     */
    public function getAge(): int {
        return $this->age;
    }
    
    /**
     * @param int $age
     */
    public function setAge(int $age): void {
        $this->age = $age;
    }
    
    /**
     * @return string
     */
    public function getGender(): string {
        return ucfirst($this->gender);
    }
    
    /**
     * @param string $gender
     */
    public function setGender(string $gender): void {
        $this->gender = strtolower($gender);
    }
    
    /**
     * @return AirlineCompany
     */
    public function getCurrentAirlineCompany(): AirlineCompany {
        return $this->currentAirlineCompany;
    }
    
    /**
     * @param AirlineCompany $currentAirlineCompany
     */
    public function setCurrentAirlineCompany(AirlineCompany $currentAirlineCompany): void {
        $this->currentAirlineCompany = $currentAirlineCompany;
    }
    
    /**
     * @return Airline
     */
    public function getCurrentAirline(): Airline {
        return $this->currentAirline;
    }
    
    /**
     * @param Airline $currentAirline
     */
    public function setCurrentAirline(Airline $currentAirline): void {
        $this->currentAirline = $currentAirline;
    }
    
    /**
     * @return SeatConfiguration
     */
    public function getCurrentSeat(): SeatConfiguration {
        return $this->currentSeat;
    }
    
    /**
     * @param SeatConfiguration $currentSeat
     */
    public function setCurrentSeat(SeatConfiguration $currentSeat): void {
        $this->currentSeat = $currentSeat;
        $currentSeat->setSeatAvailable($currentSeat->getSeatAvailable()-1);
    }
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description to print the passenger object
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function toString() {
        print("First Name\t: {$this->getFirstName()}\n");
        print("Last Name\t: {$this->getLastName()}\n");
        print("Age\t\t: {$this->getAge()}\n");
        print("Gender\t\t: {$this->getGender()}\n");
        print("Airline Company\t: {$this->getCurrentAirlineCompany()->getCarrierName()}\n");
        print("Airline\t\t: {$this->getCurrentAirline()->getBrand()} - {$this->getCurrentAirline()->getModel()}\n");
        print("Seat\t\t: {$this->getCurrentSeat()->getSeatType()}\n");
        print("CheckedIn\t: {$this->getIsCheckIn()}\n");
    }
    
    /**
     * @return bool
     */
    public function getIsCheckIn(): bool {
        return $this->isCheckIn;
    }
    
    /**
     * @param bool $isCheckIn
     */
    public function setIsCheckIn(bool $isCheckIn): void {
        $this->isCheckIn = (bool)$isCheckIn;
    }

    public function __toArray(){
        return call_user_func('get_object_vars', $this);
    }
}