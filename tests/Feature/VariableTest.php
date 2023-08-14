<?php

namespace Tests\Feature;

use App\Models\Variable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VariableTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHomeScenario(): void
    {

        $specificVariables = [
            ['variable_name' => 'currentBatteryCharge', 'variable_multiplier' => '1', 'variable_unit' => 'W'],
            ['variable_name' => 'currentBatteryDischarge', 'variable_multiplier' => '1', 'variable_unit' => 'W'],
            ['variable_name' => 'currentBatteryStateOfCharge', 'variable_multiplier' => '1', 'variable_unit' => '%'],
            ['variable_name' => 'gridFeedInOrPowerDrawn', 'variable_multiplier' => '1', 'variable_unit' => 'W'],
            ['variable_name' => 'currentPvFeedInActivePower', 'variable_multiplier' => '1', 'variable_unit' => 'W'],
        ];


        foreach ($specificVariables as $variableData) {
            Variable::factory()->create([
                'variable_name' => $variableData['variable_name'],
                'variable_multiplier' => $variableData['variable_multiplier'],
                'variable_unit' => $variableData['variable_unit'],
            ]);
        }
    }      
}
