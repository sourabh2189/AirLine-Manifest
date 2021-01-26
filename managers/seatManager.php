<?php

//require(__DIR__ . "/../models/SeatConfiguration.php");

// todo[developer] for windows change to cls
    /**
     *
     */
    define('CLEAR_CSL', 'cls');


    /**
     * Class SeatManager
     */
    class SeatManager
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
         *
         */
        public function showAvailableSeatStatus()
        {
            $airlineCompany = $this->showAirlineCompanies();
            $airline = $this->showAirlines($airlineCompany);
            $this->showSeats($airline);
            system(CLEAR_CSL);
        }

        /**
         * @return bool|string
         */
        public function showOccupiedSeatStatus()
        {
            $airlineCompany = $this->showAirlineCompanies();
            $airline = $this->showAirlines($airlineCompany);
            $sum = 0;
            foreach ($airline->getSeats() as $seat) {
                $sum += $seat->getSeatAvailable();
            }
            print(1 . ". " . "Total Occupied Seats  " . $airline->getBrand() . " " . ($airline->getTotalSeats() - $sum) . "  " . "\n");
            return system(CLEAR_CSL);
        }

        /**
         * @return AirlineCompany
         */
        public function showAirlineCompanies()
        {
            system(CLEAR_CSL);
            print("Choose Airline For Total Seats: \n");
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
         *
         */
        public function showTotalSeats(): void
        {
            $airlineCompany = $this->showAirlineCompanies();
            $airline = $this->showAirlines($airlineCompany);
            print(1 . ". " . "Total Seats For " . $airline->getBrand() . "-" . $airline->getModel() . "  " . $airline->getTotalSeats() . "\n");
            system(CLEAR_CSL);
        }

        /**
         * @param Airline $airline
         */
        public function showSeats(Airline $airline)
        {
            $seats = $airline->getSeats();
            $i = 1;
            foreach ($seats as $seat) {
                print($i++ . ". " . $seat->getSeatType() . "- available seats: " . $seat->getSeatAvailable() . "\n");
            }
        }

        /**
         * @param array $passengers
         * @return mixed
         */
        public function showPassengers(array $passengers)
        {
            $i = 1;

            foreach ($passengers as $p) {
                print("$i" .".".
                    "Name\t:{$p->getFirstName()} {$p->getLastName()} " . "|"
                    ."Age\t: {$p->getAge()} " . "|"
                    ."Gender\t: {$p->getGender()} " . "\n"
                );
                $i++;
            }
            return $passengers[readline("Enter Your Choice: ") - 1];
        }

        /**
         * @param SeatConfiguration $seatConfiguration
         * @param Passenger $passenger
         */
        public function assignSeat(SeatConfiguration $seatConfiguration, Passenger $passenger)
        {
            foreach ($seatConfiguration->getSeatArrangement($seatConfiguration->getSeatType()) as $k=>$item) {
                if(empty($item['assignedTo'])){
                    $item['assignedTo']=$passenger->__toArray();
                    $seatConfiguration->setSeatArrangement($seatConfiguration->getSeatType(),$item);
                    $passenger->setCurrentSeat($seatConfiguration);
                }
            }

        }

    }