<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    /** @test */
    public function it_can_create_a_student_and_return_201()
    {
        $data = [
            'matricule' => '2024001',
            'nom' => 'Doe',
            'prenom' => 'John',
            'cours1' => 'Mathématiques',
            'cours2' => 'Physique',
            'cours3' => 'Chimie',
            'cours4' => 'Informatique',
        ];

        $response = $this->post('/students', $data); // Requête vers la route POST

        $response->assertRedirect('/'); // Vérifie la redirection
        $this->assertDatabaseHas('students', $data); // Vérifie si l'étudiant a été créé
    }

    /** @test */
    public function it_can_get_all_students_and_return_200()
    {
        // Optionnel : Vérifie que des étudiants existent dans la base de données
        $this->assertDatabaseHas('students', [
            'nom' => 'Dumont' // Vérifie si 'Dumont' existe
        ]);

        $response = $this->get('/'); // Accède à la page des étudiants

        $response->assertStatus(200) // Vérifie le statut
                ->assertViewIs('index') // Vérifie la vue
                ->assertSee('Dumont'); // Vérifie que les noms des étudiants sont visibles dans l'ordre
    }


    /** @test */
    public function it_can_get_a_student_by_id_and_return_200()
    {
        $student = Student::factory()->create(); // Crée un étudiant

        $response = $this->get("/students/{$student->id}"); // Accède à la page de l'étudiant

        $response->assertStatus(200) // Vérifie le statut
                 ->assertViewIs('show') // Vérifie la vue
                 ->assertSee($student->nom); // Vérifie que le nom de l'étudiant est visible
    }

    /** @test */
    public function it_can_update_a_student_and_return_200()
    {
        $student = Student::factory()->create(); // Crée un étudiant

        $data = [
            'matricule' => '2024002',
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'cours1' => 'Biologie',
            'cours2' => 'Chimie',
            'cours3' => 'Physique',
            'cours4' => 'Mathématiques',
        ];

        $response = $this->put("/students/{$student->id}", $data); // Met à jour l'étudiant

        $response->assertRedirect('/'); // Vérifie la redirection
        $this->assertDatabaseHas('students', $data); // Vérifie que les données ont été mises à jour
    }

    /** @test */
    public function it_can_delete_a_student_and_return_204()
    {
        $student = Student::factory()->create(); // Crée un étudiant

        $response = $this->delete("/students/{$student->id}"); // Supprime l'étudiant

        $response->assertRedirect('/'); // Vérifie la redirection
        $this->assertDatabaseMissing('students', ['id' => $student->id]); // Vérifie que l'étudiant a été supprimé
    }
}
