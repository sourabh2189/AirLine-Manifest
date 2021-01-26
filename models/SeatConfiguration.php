<?php

    /**
     * Class SeatConfiguration
     */
    class SeatConfiguration
    {
        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description to store the seat type, e.g. First Class, Business etc
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var string
         */
        private $seatType;

        /**
         * -----------------------------------------------------------------------------------------------------------------
         * @description to store the available seat numbers;
         * -----------------------------------------------------------------------------------------------------------------
         *
         * @var int
         */
        private $seatAvailable;
        /*
       * @var array
       */
        /**
         * @var
         */
        private $seatArrangement;

        /**
         * SeatConfiguration constructor.
         * @param string $seatType
         * @param int $seatAvailable
         */
        public function __construct(string $seatType, int $seatAvailable)
        {
            $this->seatType = $seatType;
            $this->seatAvailable = $seatAvailable;
            $this->seatArrangement($seatAvailable);
        }

        /**
         * @return string
         */
        public function getSeatType(): string
        {
            return $this->seatType;
        }

        /**
         * @param string $seatType
         */
        public function setSeatType(string $seatType): void
        {
            $this->seatType = $seatType;
        }

        /**
         * @return int
         */
        public function getSeatAvailable(): int
        {
            return $this->seatAvailable;
        }

        /**
         * @param int $seatAvailable
         */
        public function setSeatAvailable(int $seatAvailable): void
        {
            $this->seatAvailable = $seatAvailable;
        }


        /**
         * @return array
         */
        public function getSeatArrangement($prop): array
        {
            return $this->seatArrangement[$prop];
        }

        public function setSeatArrangement($prop, $value)
        {
            $this->seatArrangement[$prop] = $value;
        }

        /**
         * @param $seatAvailable
         */
        public function seatArrangement($seatAvailable)
        {
            $arr = [];
            $first = current(explode(' ', $this->seatType));
            for ($i = 0; $i < $seatAvailable; $i++) {
                $arr[$first . $i] = ['checkIn'=>0,'assignedTo'=>[]];
            }
            $this->seatArrangement[$this->seatType] = $arr;
        }


    }