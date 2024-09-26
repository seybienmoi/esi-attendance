<?php

namespace Tests\Unit;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{

    /**
     * Test d'ajout d'un étudiant classique.
     */
    public function test_ajout_etudiant_classique()
    {
        // Création de l'étudiant
        $student = Student::create([
            'matricule' => 1,
            'nom' => 'SquarePants',
            'prenom' => 'SpongeBob',
            'cours1' => 'Math',
            'cours2' => 'Science',
            'cours3' => 'English',
            'cours4' => 'History',
        ]);

        // Vérification que l'étudiant est bien ajouté
        $this->assertDatabaseHas('students', [
            'matricule' => 1,
            'nom' => 'SquarePants',
            'prenom' => 'SpongeBob',
        ]);
    }

    /**
     * Test d'ajout avec un matricule négatif.
     */
    public function test_ajout_etudiant_avec_matricule_negatif()
    {
        $this->expectException(\Exception::class); // On attend une exception

        // Création d'un étudiant avec un matricule négatif
        Student::create([
            'matricule' => -1,
            'nom' => 'SquarePants',
            'prenom' => 'SpongeBob',
        ]);
    }

    /**
     * Test d'ajout d'un étudiant avec un matricule déjà existant.
     */
    public function test_ajout_etudiant_avec_matricule_existant()
    {
        // Création du premier étudiant
        Student::create([
            'matricule' => 1,
            'nom' => 'SquarePants',
            'prenom' => 'SpongeBob',
        ]);

        $this->expectException(\Exception::class); // On attend une exception pour duplicata

        // Création d'un deuxième étudiant avec le même matricule
        Student::create([
            'matricule' => 1,
            'nom' => 'SquarePants',
            'prenom' => 'SpongeBob',
        ]);
    }
}
