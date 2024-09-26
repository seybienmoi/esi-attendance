<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Les champs qui peuvent être remplis via un tableau associatif
    protected $fillable = ['matricule', 'nom', 'prenom', 'cours1', 'cours2', 'cours3', 'cours4'];

    public static function allStudent()
    {
        $students = Student::orderBy('matricule', 'asc')->get();

        return $students;
    }

}



