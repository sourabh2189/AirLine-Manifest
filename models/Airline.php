<?php

    /**
     * Class Airline
     */
    class Airline
    {
        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description The brand name of the airline;
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var string
         */
        private $brand;

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description the specific model name of the airline as any brand can be sub divided into specific model
         * So each object will represent the specific model and brand of airline
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var string
         */
        private $model;

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description To store the seat configuration of the airline
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var array
         */
        private $seats;

        /*
        * @var array
        */
        /**
         * @var
         */
        private $totalSeats;

        /**
         * Flight number.
         */
        private $flightNumber;

        /**
         * Origin code.
         */
        private $originCode;

        /**
         * Destination code.
         */
        private $destinationCode;

        /**
         * Airline constructor.
         * @param string $brand
         * @param string $model
         * @param array $seats
         */
        public function __construct(string $brand, string $model, array $seats = [])
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->seats = $seats;
            $this->flightNumber = null;
            $this->originCode = null;
            $this->destinationCode = null;
            $this->setTotalSeats($seats);
        }

        /**
         * @return string
         */
        public function getBrand(): string
        {
            return $this->brand;
        }

        /**
         * @param string $brand
         */
        public function setBrand(string $brand): void
        {
            $this->brand = $brand;
        }

        /**
         * @return string
         */
        public function getModel(): string
        {
            return $this->model;
        }

        /**
         * @param string $model
         */
        public function setModel(string $model): void
        {
            $this->model = $model;
        }

        /**
         * @return SeatConfiguration[]
         */
        public function getSeats(): array
        {
            return $this->seats;
        }

        /**
         * @param array $seats
         */
        public function setSeats(array $seats): void
        {
            $this->seats = $seats;
        }


        /**
         * @return int
         */
        public function getTotalSeats(): int
        {
            return array_sum($this->totalSeats);
        }

        /**
         * @param array $totalSeats
         */
        public function setTotalSeats(array $totalSeats): void
        {
            $array = [];
            foreach ($totalSeats as $k => $ac) {
                $array[$ac->getSeatType()] = $ac->getSeatAvailable();
            }
            $this->totalSeats = $array;
        }

        /**
         * @return string
         */
        public function getFlightNumber()
        {
            return $this->flightNumber;
        }

        /**
         * Get origin code.
         * @return originCode .
         */
        public function getOriginCode()
        {
            return $this->originCode;
        }

        /**
         * Get destination code.
         * @return destinationCode .
         */
        public
        function getDestinationCode()
        {
            return $this->destinationCode;
        }

        /**
         * @param string $flightNumber
         */
        public function setFlightNumber(string $flightNumber): void
        {
            $this->flightNumber = $flightNumber;
        }

        /**
         * @param string $originCode
         */
        public function setOriginCode(string $originCode): void
        {
            $this->originCode = $originCode;
        }

        /**
         * @param string $destinationCode
         */
        public function setDestinationCode(string $destinationCode): void
        {
            $this->destinationCode = $destinationCode;
        }

        /**
         * @return string
         */
        public function flightNumber(){
            return $this->getBrand().' - '.$this->getDestinationCode().' - '.rand(100,1000);
        }


    }