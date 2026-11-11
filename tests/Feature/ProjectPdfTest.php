<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectPdfTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_before_opening_the_project_pdf_report(): void
    {
        $this->get(route('project.pdf'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_print_all_projects_in_the_pdf_report(): void
    {
        $user = User::factory()->create();

        foreach (range(1, 8) as $number) {
            Project::query()->create([
                'title' => "Project {$number}",
                'description' => "Description {$number}",
                'teknologi' => 'Laravel',
                'image' => "project{$number}.jpg",
                'status' => 'active',
            ]);
        }

        $this->actingAs($user)
            ->get(route('project.pdf'))
            ->assertOk()
            ->assertSee('Cetak / Simpan PDF')
            ->assertSee('Project 8')
            ->assertSee('Description 8')
            ->assertSee('project8.jpg');
    }
}
