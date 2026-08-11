<?php

namespace Waveforms\Servos;

use GeneralPurposeIO\Core\MagicAliases\Circuit;
use Waveforms\Contracts\Actuation\ActuatorException;
use Waveforms\Contracts\Actuation\Interfaces\ContinuousServo as ContinuousServoCircuit;

class ContinuousServo extends PositionalServo
{
    public function __construct(ContinuousServoCircuit $circuit)
    {
        parent::__construct($circuit);
    }

    public function clockwise(int $speed = 100): void
    {
        $this->continuous()->clockwise($speed);
    }

    public function counterClockwise(int $speed = 100): void
    {
        $this->continuous()->counterClockwise($speed);
    }

    public function cw(int $speed = 100): void
    {
        $this->continuous()->cw($speed);
    }

    public function ccw(int $speed = 100): void
    {
        $this->continuous()->ccw($speed);
    }

    public function stop(): void
    {
        $this->continuous()->stop();
    }

    public function deadband(int $lower, int $upper): static
    {
        $this->continuous()->deadband($lower, $upper);

        return $this;
    }

    public static function circuit(string $driver): static
    {
        $circuit = Circuit::profile($driver);

        if ($circuit instanceof ContinuousServoCircuit) {
            return new static($circuit);
        }

        throw new ActuatorException("Circuit [{$driver}] is not a ContinuousServo.");
    }

    protected function continuous(): ContinuousServoCircuit
    {
        /** @var ContinuousServoCircuit */
        return $this->servo;
    }
}
