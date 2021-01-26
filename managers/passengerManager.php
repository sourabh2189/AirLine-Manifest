<?php

    require(__DIR__ . "/../models/Passenger.php");

    /**
     *
     */
    define('CLEAR_CSL', 'cls');


    /**
     * Class PassengerManager
     */
    class PassengerManager
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
         * PassengerManager constructor.
         * @param $airlineCompanies
         */
        public function __construct($airlineCompanies)
        {
            $this->airlineCompanies = $airlineCompanies;
        }

        /**
         * @return Passenger
         * @throws Exception
         */
        public function showAcceptPassenger()
        {
            $firstName = readline("First Name: ");
            $lastName = readline("Last Name: ");
            $age = readline("Age: ");
            if (!is_numeric($age)) {
                print('Age Should Be Numeric Please ReEnter Valid values' . "\n");
                $this->showAcceptPassenger();
            }
            $gender = readline("Gender: ");
            $airlineCompany = $this->showAirlineCompanies();
            $airline = $this->showAirlines($airlineCompany);
            $origin = readline("originCity: ");
            $destination = readline("destinationCity: ");
            if (!($this->validAirportCode($origin) && $this->validAirportCode($destination))) {
                throw new Exception("Flight origin and destination are not valid."
                    . " Valid Origin & Destination are 3 letter airport/city codes");
            }
            $airline->setOriginCode($origin);
            $airline->setDestinationCode($destination);
            $airline->setFlightNumber($airline->flightNumber());
            $seat = $this->showSeats($airline);
            system(CLEAR_CSL);
            print("New Passenger: \n");
            if ($this->validPassengerData($firstName, $lastName, $age, $gender)) {
                throw new Exception("All Fields are Required and Must be in Valid Form");
            }
            $passenger = new Passenger($firstName, $lastName, $age, $gender, $airlineCompany, $airline, $seat);
            $passenger->toString();
            return $passenger;
        }

        /**
         * @return AirlineCompany
         */
        public function showAirlineCompanies()
        {
            system(CLEAR_CSL);
            print("Choose Airline For Passenger: \n");
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
        public function showAirlines(AirlineCompany $airlineCompany): Airline
        {
            $i = 1;
            system(CLEAR_CSL);
            foreach ($airlineCompany->getAirlines() as $airline) {
                print($i++ . ". " . $airline->getBrand() . " - " . $airline->getModel() . "\n");
            }
            return $airlineCompany->getAirlines()[readline("Enter Your Choice: ") - 1];
        }

        /**
         * @param Airline $airline
         * @return SeatConfiguration
         */
        public function showSeats(Airline $airline)
        {
            $seats = $airline->getSeats();
            $i = 1;
            system(CLEAR_CSL);
            foreach ($seats as $seat) {
                print($i++ . ". " . $seat->getSeatType() . "- available seats: " . $seat->getSeatAvailable() . "\n");
            }
            $seat = readline("Enter Your Choice: ") - 1;
            if ($seat < -1 || $seat > count($airline->getSeats())) {
                return $this->showSeats($airline);
            }
            return $airline->getSeats()[$seat];
        }

        /**
         * @param Passenger[] $passengers
         */
        public function showPassengers(array $passengers)
        {
            $i = 1;
            foreach ($passengers as $p) {
                print("$i " .
                    "{$p->getFirstName()} {$p->getLastName()} " .
                    "| Flight: " .
                    "{$p->getCurrentAirlineCompany()->getCarrierName()}-{$p->getCurrentAirlineCompany()->getHeadquarters()} " .
                    "| {$p->getCurrentAirline()->getBrand()} - {$p->getCurrentAirline()->getModel()} " .
                    "| {$p->getCurrentSeat()->getSeatType()}\n"

                );
            }
        }

        /**
         * @param $code
         * @return bool
         */
        private function validAirportCode($code)
        {
            if ($code == NULL || strlen($code) != 3) {
                return FALSE;
            }
            for ($i = 0; $i < strlen($code); $i++) {
                if (!ctype_alpha(substr($code, $i, 1))) {
                    return FALSE;
                }
            }
            return TRUE;
        }

        /**
         * @param $firstName
         * @param $lastName
         * @param $age
         * @param $gender
         * @return bool
         */
        private function validPassengerData($firstName, $lastName, $age, $gender)
        {
            if (($firstName == NULL || !is_string($firstName)) || ($lastName == NULL || !is_string($lastName)) || ($age == NULL || !is_numeric($age) && $age < 180)) {
                return FALSE;
            }
            if ($gender == NULL || !is_string($gender) && !in_array(strtolower($gender),['male','female','other','m','f','o','t','transgender'])) {
                return FALSE;
            }

            return TRUE;
        }

    }