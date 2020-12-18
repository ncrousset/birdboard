<?php

namespace Tests\Unit;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase ;

    /** @test */
    public function is_has_a_path()
    {
        $project =  Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());

    }
}
