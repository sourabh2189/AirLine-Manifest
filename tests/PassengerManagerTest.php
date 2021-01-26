<?php declare(strict_types=1);

    use PHPUnit\Framework\TestCase;
    require(__DIR__ . "/../staticData.php");
    require(__DIR__ . "/../managers/passengerManager.php");

    final class PassengerManagerTest extends TestCase
    {
        public function testShowAcceptPassenger()
        {
            $staticData = new StaticData();

            $airlineCompanies = [
                $staticData->getQantas(),
                $staticData->getSingapore(),
                $staticData->getEmirates(),
            ];
            $passenger = new PassengerManager($airlineCompanies);
            $this->assertEquals(Passenger::class,  $passenger->showAcceptPassenger());
        }

        public function testShowPassengers()
        {
            $staticData = new StaticData();

            $airlineCompanies = [
                $staticData->getQantas(),
                $staticData->getSingapore(),
                $staticData->getEmirates(),
            ];
            $passenger = new PassengerManager($airlineCompanies);
            $passengers[]=$passenger->showAcceptPassenger();
            $this->assertTrue(is_string($passenger->showPassengers($passengers)));
        }

    }