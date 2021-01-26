<?php

    /**
     *
     */
    define('CLEAR_CSL', 'cls');


    /**
     * Class SeatManager
     */
    class AirCraftManager
    {

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description to store the different companies
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var AirlineCompany[]
         */
        private $airlineCompanies;


        /**
         * SeatManager constructor.
         * @param $airlineCompanies
         */
        public function __construct($airlineCompanies)
        {
            $this->airlineCompanies = $airlineCompanies;
        }


        /**
         * @return AirlineCompany
         */
        public function showAirlineCompanies()
        {
            system(CLEAR_CSL);
            $i = 1;
            foreach ($this->airlineCompanies as $ac) {
                print($i++ . ". " . $ac->getCarrierName() . "\n");
            }
            return $this->airlineCompanies[readLine("Enter Your Choice: ") - 1];
        }

        /**
         * @param AirlineCompany $airlineCompany
         * @return Airline
         */
        public function showAirlines(AirlineCompany $airlineCompany)
        {
            $i = 1;
            system(CLEAR_CSL);
            foreach ($airlineCompany->getAirlines() as $airline) {
                print($i++ . ". " . $airline->getBrand() . " - " . $airline->getModel() . $airline->getFlightNumber() . "\n");
            }
        }

        /**
         * @return Airline
         */
        public function showAircraftInfo()
        {
            $airlineCompany = $this->showAirlineCompanies();
            return $this->showAirlines($airlineCompany);
        }


    }