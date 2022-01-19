<?php

namespace Tests\Feature;

use App\Models\Breed;
use Database\Seeders\BreedSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BreedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new breed.
     *
     * @return void
     */
    public function test_breeds_can_be_created()
    {
        $this->assertDatabaseCount('breeds', 63);

        $this->assertDatabaseHas('breeds', [
            'name' => 'American Shorthair',
        ]);
    }

    public function test_breeds_can_be_deleted()
    {
        $breed = Breed::find(1);

        $breed->delete();

        $this->assertDeleted($breed);
    }
}
