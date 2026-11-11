<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_see_ten_projects_per_page_by_default(): void
    {
        $user = User::factory()->create();

        foreach (range(1, 11) as $number) {
            Project::query()->create([
                'title' => "Project {$number}",
                'teknologi' => 'Laravel',
            ]);
        }

        $this->actingAs($user)
            ->get(route('project.index'))
            ->assertOk()
            ->assertSee('Project 1')
            ->assertSee('Project 10')
            ->assertDontSee('Project 11');
    }

    public function test_search_filters_projects_by_title(): void
    {
        $user = User::factory()->create();
        Project::query()->create(['title' => 'ERP inventory', 'teknologi' => 'Laravel']);
        Project::query()->create(['title' => 'Student portal', 'teknologi' => 'React']);

        $this->actingAs($user)
            ->get(route('project.index', ['search' => 'ERP']))
            ->assertOk()
            ->assertSee('ERP inventory')
            ->assertDontSee('Student portal');
    }

    public function test_invalid_page_size_is_rejected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('project.index', ['per_page' => 5]))
            ->assertRedirect()
            ->assertSessionHasErrors('per_page');
    }
}
