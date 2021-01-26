<?php

    require "staticData.php";
    require "managers/passengerManager.php";
    require "managers/seatManager.php";
    require "managers/airCraftManager.php";

    class Index
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
         * -----------------------------------------------------------------------------------------------------------------
         * @description to keep track of the passengers on memory level only
         * -----------------------------------------------------------------------------------------------------------------
         * @var Passenger[]
         */
        private $passengers = [];

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description manager for the passenger related task
         * -----------------------------------------------------------------------------------------------------------------
         * @var PassengerManager
         */
        private $passengerManager;
        private $seatManager;
        private $airCraftManager;

        public function __construct()
        {
            // this can be replace with the db connection or else, binding can make it loosely coupled here
            $staticData = new StaticData();

            $this->airlineCompanies = [
                $staticData->getQantas(),
                $staticData->getSingapore(),
                $staticData->getEmirates(),
            ];

            $this->passengerManager = new PassengerManager($this->airlineCompanies);
            $this->seatManager = new SeatManager($this->airlineCompanies);
            $this->airCraftManager = new AirCraftManager($this->airlineCompanies);
        }

        public function showMainMenu()
        {
            system(CLEAR_CSL);
            print("-----------------------------------------------------------------------------------------------------------------\n");
            print("1. Accept Passenger\n");
            print("2. List Passenger\n");
            print("3. No of Seat\n");
            print("4. No of Seats Available\n");
            print("5. No of Seats Occupied\n");
            print("6. Get Aircraft Info\n");
            print("7. Check In Passenger\n");
            $action = readline("Enter your choice: ");

            if ($action < 0 || $action > 10) {
                $this->showMainMenu();
            } else if ($action == 0) {
                print("here");
                exit();
            }
            $this->mainMenuAction($action);
        }

        public function mainMenuAction($action)
        {
            switch ($action) {
                case 1: // accept passenger
                    system(CLEAR_CSL);
                    $passenger = $this->passengerManager->showAcceptPassenger();
                    $this->passengers[] = $passenger;
                    $this->showContinue();
                    break;
                case 2:
                    system(CLEAR_CSL);
                    $this->passengerManager->showPassengers($this->passengers);
                    $this->showContinue();
                    break;
                case 3:
                    system(CLEAR_CSL);
                    $this->seatManager->showTotalSeats();
                    $this->showContinue();
                    break;
                case 4:
                    system(CLEAR_CSL);
                    $this->seatManager->showAvailableSeatStatus();
                    $this->showContinue();
                    break;
                case 5:
                    system(CLEAR_CSL);
                    $this->seatManager->showOccupiedSeatStatus();
                    $this->showContinue();
                    break;
                case 6:
                    system(CLEAR_CSL);
                    $this->airCraftManager->showAircraftInfo();
                    $this->showContinue();
                    break;
                case 7:
                    system(CLEAR_CSL);
                    if (empty($this->passengers)) {
                        $passenger = $this->passengerManager->showAcceptPassenger();
                        $this->passengers[] = $passenger;
                    }
                    $passenger = $this->seatManager->showPassengers($this->passengers);
                    $passenger->setIsCheckIn(TRUE);
                    $passenger->toString();
                    $this->showContinue();
                    break;
            }
        }

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description to show for user to continue or not
         * -----------------------------------------------------------------------------------------------------------------
         */
        public function showContinue()
        {
            print("-----------------------------------------------------------------------------------------------------------------\n");
            print("1. Main Menu\n");
            print("0. Exit\n");
            $action = readline("Enter Your Choice: ");
            if ($action == 0) {
                exit();
            } else {
                $this->showMainMenu();
            }
        }

    }

    $main = new Index();
    $main->showMainMenu();
