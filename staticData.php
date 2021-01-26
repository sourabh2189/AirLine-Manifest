<?php

require "models/Airline.php";
require "models/AirlineCompany.php";
require "models/SeatConfiguration.php";

/**
 * -----------------------------------------------------------------------------------------------------------------
 * @description this class is to just store the static data and can be replaced with the other data management,
 * So preferred to keep this in loosely couple architecture
 * -----------------------------------------------------------------------------------------------------------------
 *
 * Class StaticData
 * @package R
 */
class StaticData {
    
    /**
     *
     * -----------------------------------------------------------------------------------------------------------------
     * @description to get the qantas airline details
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @return AirlineCompany
     */
    public function getQantas() {
        $airlines = [
            new Airline("Boeing", "737-800", $this->getSeats(0, 13, 0, 162)),
            new Airline("Airbus", "A380", $this->getSeats(14, 64, 35, 371)),
            new Airline("Dash", "8", $this->getSeats(0, 0, 0, 38)),
        ];
        return new AirlineCompany("Qantas", "Australia", $airlines);
    }
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description to get the singapore airline details
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @return AirlineCompany
     */
    public function getSingapore(): AirlineCompany {
        $airlines = [
            new Airline("Boeing", "737-800", $this->getSeats(0, 8, 14, 160)),
            new Airline("Airbus", "A380", $this->getSeats(12, 80, 40, 360)),
            new Airline("Dash", "8", $this->getSeats(0, 0, 4, 30)),
        ];
        return new AirlineCompany("Singapore Airlines", "Singapore", $airlines);
    }
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description to get the emirates airline details
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @return AirlineCompany
     */
    public function getEmirates(): AirlineCompany {
        $airlines = [
            new Airline("Boeing", "737-800", $this->getSeats(4, 8, 6, 150)),
            new Airline("Airbus", "A380", $this->getSeats(16, 64, 50, 300)),
            new Airline("Dash", "8", $this->getSeats(0, 0, 0, 40)),
        ];
        return new AirlineCompany("Emirates", "UAE", $airlines);
    }
    
    /**
     * -----------------------------------------------------------------------------------------------------------------
     * @description To get the seats arrangement
     * @note this will only return static data as provided
     * -----------------------------------------------------------------------------------------------------------------
     *
     * @param int $firstClass
     * @param int $business
     * @param int $premiumEconomy
     * @param int $economySeats
     * @return SeatConfiguration[]
     */
    public function getSeats(int $firstClass, int $business, int $premiumEconomy, int $economySeats): array {
        return [
            new SeatConfiguration("First Class", $firstClass),
            new SeatConfiguration("Business", $business),
            new SeatConfiguration("Premium Economy", $premiumEconomy),
            new SeatConfiguration("Economy Seats", $economySeats),
        ];
    }
    
    
}
