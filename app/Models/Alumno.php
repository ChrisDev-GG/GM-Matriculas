<?php

namespace App\Models;

use App\Http\Requests\RegistroAlumnoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function store(RegistroAlumnoRequest $request){
        $alumno = new Alumno();
        $alumno->names = $request->names;
        $alumno->paternal_surename = $request->paternal_surename;
        $alumno->maternal_surename = $request->maternal_surename;
        $alumno->grade = $request->grade;
        $alumno->run = $request->run;
        $alumno->address = $request->address;
        $alumno->digit_run = $request->digit_run;
        $alumno->email = $request->email;
        $alumno->phone = $request->phone;
        $alumno->birth_date = $request->fecha_de_nacimiento;
        $alumno->gender = $request->genero;
        $alumno->id_apoderado = $request->rut_apoderado;
        $alumno->id_user = $request->id_user;
        $alumno->save();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function apoderado(){
        return $this->belongsTo(Apoderado::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'names',
        'paternal_surename',
        'maternal_surename',
        'grade',
        'address',
        'run',
        'digit_run',
        'birth_date',
        'gender',
        'email',
        'phone',
        'status',
        'id_apoderado',
        'id_user',
    ];
}
