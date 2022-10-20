@extends('sharedpdf')

@section('pdf')
<?php
use App\Http\Controllers\MatriculasController;
$date = new MatriculasController;
$todayDate = $date->getDate();
$year = (int) $todayDate[2];
if($todayDate[1]=='diciembre'||$todayDate[1]=='Diciembre'){
    $year += 1;
}
?>
<div>
    <h2 class="title">COLEGIO GABRIELA MISTRAL</h2>
    <h3 class="title_two">CONTRATO DE PRESTACIÓN DE SERVICIOS ESTUDIANTILES</h3>
</div>    
<div>
    <p>
        En Ovalle, a <?php echo($todayDate[0]." de ".$todayDate[1]." de ".$todayDate[2]) ?> se celebra el siguiente contrato de prestación de 
        servicios educacionales, entre la corporación Educacional Gomez Formas sostenedora del Colegio Gabriela Mistral con domicilio en calle 
        Coquimbo Nº 478, Ovalle en adelante y:
    </p>
    <h3 class="title-three">Datos Apoderado:</h3>
    <p>
        Nombre Apoderado: ........ <br>
        RUT:              ........ <br>
        Domicilio:        ........ <br>
        Fono:             ........ <br>
        E-Mail:           ........
    </p>
    <h3 class="title-three">Datos Alumno:</h3>
    <p>
        Nombre Alumno:  ........ <br>
        RUT:            ........ <br>
        Curso:          ........ <br>
    </p>
    <p>
        <b>I.</b> Don ............... matricula en el Colegio Gabriela Mistral de Ovalle en calidad de alumno a su pupilo(a)
        ...................... <b>II.</b> por el presente año lectivo <?php echo($year) ?> a:
    </p>
    <p>
        <b>1.</b> Atender Educacionalmente al alumno, tratando pedagógicamente los contenidos, objetivos y planes de estudios aprobados por el
        Ministerio de Educación para el respectivo nivel curso.<br>
        <b>1.1.</b> El colegio ofrece las dependencias para ser realizadas todas las actividades académicas.<br>
        <b>1.2.</b> El colegio ofrece alternativas de actividades extra programáticas en las cuales el alumno deberá integrarse al menos a una
        de ellas de acuerdo a sus aptitudes, intereses y disponibilidad de tiempo.<br>
        <b>1.3.</b> El colegio ofrece material didáctico, implementación de salas de higiene permanente del establecimiento.<br>
        <b>1.4.</b> El colegio se compromete a difundir el reglamento Interno de Evaluación y disposiciones generales del establecimiento y 
        administrar medidas para su cumplimiento.<br>
        <b>1.5.</b> El colegio de compromete a organizar actividades extracurriculares que vayan en beneficio de la formación integral del alumno.
        Como son las de carácter cultural, deportivas, artísticas, recreativas, y toda otra actividad que vaya en logro del objetivo antes 
        mencionado.<br>
        <b>1.6.</b> El colegio se compromete a posibilitar el contacto de sus alumnos con las distintas instituciones; que puedan ofrecer una
        proyección tanto en el corto plazo como a futuro; tales como colegio en donde puedan continuar su educación secundaria, Instituciones de
        educación superior, empresas y organizaciones del Estado, etc.<br><br>
        <b>2.</b> Por el presente contrato, el alumno se compromete durante el el año lectivo <?php echo($year) ?> a:<br>
        <b>2.1.</b> El alumno se compromete a cuidar las dependencias y materiales pertenecientes al establecimiento.<br>
        <b>2.2.</b> El alumno se compromete a respetar y dar cumplimiento de las normas contempladas en el reglamento interno del colegio.<br>
    </p>

</div>
    <div class="page-break"></div>
    <div>
        <p>
            <b>2.3.</b> El alumno de compromete a mantener una buena conducta, sentido de la honradez, vocabulario apropiado y respeto entre sus 
            padres y figuras de autoridad.<br>
            <b>2.4.</b> El alumno se compromete a rendir en forma satisfactoria todos los subsectores de su respectivo plan de estudio para poder 
            ser promovido.<br>
            <b>2.5.</b> El alumno se compromete a rendir todas las evaluaciones que su nivel o curso requiera.<br><br>
            <b>3.</b> Por el presente contrato, el apoderado se compromete por el año lectivo <?php echo($year) ?> a:<br>
            <b>3.1.</b> El apoderado se compromete a cancelar oportunamente las cuotas en las fechas estipuladas por el establecimiento. El colegio se 
            guarda la facultad de cancelar la matricula en el caso de existir irregularidades en pagos de cuotas (atrasos excesivos o reiterados) 
            para el año lectivo <?php echo($year) ?>.<br>
            <b>3.2.</b> El apoderado se compromete a cancelar los daños que provoque su hijo(a) tanto al estalecimiento como a terceros.<br>
            <b>3.3</b> El apoderado se compromete a asistir a las reuniones y talleres estipulados con anterioridad por el colegio.<br>
            <b>3.4.</b> El apoderado se compromete a asistir periódicamente al establecimiento para mantenerse informado del rendimiento y conducta
            de su hijo(a).<br>
            <b>3.5.</b> El apoderado se compromete a colaborar y participar activa y responsablemente en el proceso de enseñanza-aprendizaje de 
            su hijo(a).<br>
            <b>3.6.</b> El apoderado se compromete a mantener una buena relación con todos los entes del establecimiento sin perjudicar a este con 
            situaciones conflictivas fuera o dentro del recinto.<br>
            <b>4.</b> Si el alumno ya matriculado, es retirado, el colegio no devolverá los montos cancelados a la fecha del retiro.<br>
            <b>5.</b> El presente contrato de prestación de servicios regirá para el año lectivo <?php echo($year) ?> y terminará el 30 de 
            diciembre de <?php echo($year) ?>.<br><br>
            <i>Queda un original en poder del establecimiento y otra copia en poder del apoderado, los cuales en el momento de firmar dan conformidad
            de lo establecido en el presente contrato.</i><<br><br><br><br><br><br><br><br><br>
        </p>

        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ________________________
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ________________________
        </p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>NOMBRE Y FIRMA <
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            CORP. GOMEZ FORMAS <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            DEL APODERADO
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            SOSTENEDORA<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            COLEGIO GABRIELA MISTRAL</b>
        </p>
    </div>

@endsection
