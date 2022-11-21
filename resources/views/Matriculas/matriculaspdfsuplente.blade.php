

@extends('sharedpdf')

@section('pdf')
<div>
    <h2 class="title">COLEGIO GABRIELA MISTRAL</h2>
    <h3 class="title_two">CONTRATO DE PRESTACIÓN DE SERVICIOS ESTUDIANTILES</h3>
</div>    
<div>
    <p> 
        En Ovalle, a {{$date[0][0]}} de {{$date[0][1]}} de {{$date[0][2]}} se celebra el siguiente contrato de prestación de 
        servicios educacionales, entre la corporación Educacional Gomez Formas sostenedora del Colegio Gabriela Mistral con domicilio en calle 
        Coquimbo Nº 478, Ovalle en adelante y:
    </p>
    <h3 class="title-three">Datos Apoderado:</h3>
    <p>
        Nombre Apoderado: {{$data['suplente']['name'] ?? '__________________'}}<br>
        RUT:              {{$data['suplente']['run'] ?? '__________________'}} <br>
        Domicilio:        {{$data['suplente']['address'] ?? '__________________'}} <br>
        Fono:             {{$data['suplente']['phone'] ?? '__________________'}} <br>
        E-Mail:           {{$data['suplente']['email'] ?? '__________________'}}
    </p>
    <h3 class="title-three">Datos Alumno:</h3>
    <p>
        Nombre Alumno:  {{$data['alumno']['names'] ?? '__________________'}} {{$data['alumno']['paternal_surename'] ?? '__________________'}} {{$data['alumno']['maternal_surename'] ?? '__________________'}}<br>
        RUT:            {{$data['alumno']['run'] ?? '__________________'}}-{{$data['alumno']['digit_run'] ?? '__________________'}} <br>
        Curso:          {{$data['alumno']['grade'] ?? '__________________'}} <br>
    </p>
    <p>
        <b>I.</b> Don {{$data['suplente']['name'] ?? '__________________'}} matricula en el Colegio Gabriela Mistral de Ovalle en calidad de alumno a su pupilo(a)
        {{$data['alumno']['names'] ?? '__________________'}} {{$data['alumno']['paternal_surename'] ?? '__________________'}} {{$data['alumno']['maternal_surename'] ?? '__________________'}} <b>II.</b> por el presente año lectivo {{$date[1]}} a:
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
        <b>2.</b> Por el presente contrato, el alumno se compromete durante el el año lectivo {{$date[1]}} a:<br>
        <b>2.1.</b> El alumno se compromete a cuidar las dependencias y materiales pertenecientes al establecimiento.<br>
        <b>2.2.</b> El alumno se compromete a respetar y dar cumplimiento de las normas contempladas en el reglamento interno del colegio.<br>
    </p>

</div>
    <div class="page-break"></div>
    <div>
        <p>
            <b>2.3.</b> El alumno se compromete a mantener una buena conducta, sentido de la honradez, vocabulario apropiado y respeto entre sus 
            padres y figuras de autoridad.<br>
            <b>2.4.</b> El alumno se compromete a rendir en forma satisfactoria todos los subsectores de su respectivo plan de estudio para poder 
            ser promovido.<br>
            <b>2.5.</b> El alumno se compromete a rendir todas las evaluaciones que su nivel o curso requiera.<br><br>
            <b>3.</b> Por el presente contrato, el apoderado se compromete por el año lectivo {{$date[1]}} a:<br>
            <b>3.1.</b> El apoderado se compromete a cancelar oportunamente las cuotas en las fechas estipuladas por el establecimiento. El colegio se 
            guarda la facultad de cancelar la matricula en el caso de existir irregularidades en pagos de cuotas (atrasos excesivos o reiterados) 
            para el año lectivo {{$date[1]}}.<br>
            <b>3.2.</b> El apoderado se compromete a cancelar los daños que provoque su hijo(a) tanto al estalecimiento como a terceros.<br>
            <b>3.3</b> El apoderado se compromete a asistir a las reuniones y talleres estipulados con anterioridad por el colegio.<br>
            <b>3.4.</b> El apoderado se compromete a asistir periódicamente al establecimiento para mantenerse informado del rendimiento y conducta
            de su hijo(a).<br>
            <b>3.5.</b> El apoderado se compromete a colaborar y participar activa y responsablemente en el proceso de enseñanza-aprendizaje de 
            su hijo(a).<br>
            <b>3.6.</b> El apoderado se compromete a mantener una buena relación con todos los entes del establecimiento sin perjudicar a este con 
            situaciones conflictivas fuera o dentro del recinto.<br>
            <b>4.</b> Si el alumno ya matriculado, es retirado, el colegio no devolverá los montos cancelados a la fecha del retiro.<br>
            <b>5.</b> El presente contrato de prestación de servicios regirá para el año lectivo {{$date[1]}} y terminará el 30 de 
            diciembre de {{$date[1]}}.<br><br>
            <i>Queda un original en poder del establecimiento y otra copia en poder del apoderado, los cuales en el momento de firmar dan conformidad
            de lo establecido en el presente contrato.</i><<br><br><br><br><br><br><br><br><br>
        </p>

        <p class="apoderado-name">
            {{$data['suplente']['name'] ?? '__________________'}}
        </p>

        <p class="line1">
            ________________________
        </p>
        <p class="line2">
            ________________________
        </p>

        <p class="apoderado-firma">
            <b>Nombre y firma<br>
            &nbsp;del Apoderado</b>
        </p>
        <p class="institucion-firma">
            <b>&nbsp;&nbsp;&nbsp;&nbsp;CORP. GOMEZ FORMAS<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SOSTENEDORA DEL<br>
            COLEGIO GABRIELA MISTRAL</b>
        </p>
    </div>

@endsection
