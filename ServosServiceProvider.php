<?php

namespace Waveforms\Servos;

use Fabricate\NutsAndBolts\ServiceProvider;
use Waveforms\Core\MagicAliases\Actuator;

class ServosServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config('waveforms.positional-servo.enabled', false)) {
            Actuator::addActuator('positional-servo', PositionalServo::class);
        }

        if (config('waveforms.continuous-servo.enabled', false)) {
            Actuator::addActuator('continuous-servo', ContinuousServo::class);
        }
    }
}
