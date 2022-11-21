<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApoderadoSuplente extends Model
{
    use HasFactory;

    public $table = 'apoderados_suplentes';
    
    public function store(Request $request){
        $suplente = new ApoderadoSuplente;
        $suplente->name = $request->name;
        $suplente->run = $request->run;
        $suplente->email = $request->email;
        $suplente->phone = $request->phone;
        $suplente->id_apoderado = $request->id_apoderado;
        $suplente->address = $request->address;
        $suplente->id_user = $request->id_user;
        $suplente->save();
    }

    public function getId(){
        return $this->id;
    }

    public function Apoderados(){
        return $this->belongsTo(Apoderado::class);
    }

    protected $fillable = [
        'name',
        'run',
        'id_apoderado',
        'email',
        'phone',
        'status',
        'address',
        'id_user',
    ];

    protected $appends = [
        'apoderado_name',
        'apoderado_run',
        'apoderado_email',
        'apoderado_phone',
    ];
}
