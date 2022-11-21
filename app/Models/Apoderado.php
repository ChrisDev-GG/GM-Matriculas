<?php

namespace App\Models;

use App\Http\Requests\RegistroApoderadoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Apoderado extends Model
{
    use HasFactory;

    public $table = 'apoderados';
    
    public function store(RegistroApoderadoRequest $request){
        $apoderado = new Apoderado;
        $apoderado->name = $request->name;
        $apoderado->run = $request->run;
        $apoderado->email = $request->email;
        $apoderado->phone = $request->phone;
        $apoderado->address = $request->address;
        $apoderado->id_user = $request->id_user;
        $apoderado->save();
    }
    public function getId(){
        return $this->id;
    }
    public function Alumnos(){
        return $this->hasMany(Alumno::class);
    }
    public function ApoderadosSuplentes(){
        return $this->hasMany(ApoderadoSuplente::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'run',
        'digit_run',
        'email',
        'phone',
        'status',
        'address',
        'id_user',
    ];

}
