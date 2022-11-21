
function isValidFormAlumnos(){
    let send = document.getElementById("send");
    let inp1 = document.getElementById("InputAlumno").value;
    let inp2 = document.getElementById("InputPS").value;
    let inp3 = document.getElementById("InputMS").value;
    let inp4 = document.getElementById("InputRun").value;
    let inp5 = document.getElementById("InputCorreo").value;
    let inp6 = document.getElementById("InputTelefono").value;
    let inp7 = document.getElementById("GradeInput").value;
    let inp8 = document.getElementById("select-run").value;

    let date = document.getElementById("InputDate").value;
    let rbtn1 = document.getElementById("radios1");
    let rbtn2 = document.getElementById("radios2");

    console.log(rbtn1.checked);
    if(inp1 == "" && inp2 == "" && inp3 == "" && inp4 == "" && inp5 == "" && inp6 == "" && inp7 == "" && inp8 == "" && date == "" &&(!rbtn1.checked&&!rbtn2.checked)){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>Los campos estan vacios</li>
                    </ul>
                </div>                
            `;
        document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    }else{
        document.getElementById("errors").innerHTML = ''; 
    }
    /* else if(!Fn.validaRut(inp4)&&inp4!=""){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>El Rut no es valido</li>
                    </ul>
                </div>                
            `;
            document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    } */
}

//-----------------------------------------------------------------------------

function isValidFormApoderados(){
    let send = document.getElementById("send");
    let inp1 = document.getElementById("InputNames").value;
    let inp2 = document.getElementById("InputRun").value;
    let inp3 = document.getElementById("InputCorreo").value;
    let inp4 = document.getElementById("InputTelefono").value;
    let inp5 = document.getElementById("InputAddress").value;

    if(inp1 == "" && inp2 == "" && inp3 == "" && inp4 == "" && inp5 == "" ){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>Los campos estan vacios</li>
                    </ul>
                </div>                
            `;
        document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    }else{
        document.getElementById("errors").innerHTML = ''; 
    }
    
    /* else if(!Fn.validaRut(inp3)&&inp3!=""){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>El Rut no es valido</li>
                    </ul>
                </div>                
            `;
            document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    } */
}

//-----------------------------------------------------------------------------

function isValidFormRegistro(){
    let send = document.getElementById("send");
    let inp1 = document.getElementById("InputNames").value;
    let inp2 = document.getElementById("InputSurename1").value;
    let inp3 = document.getElementById("InputSurename2").value;
    let inp4 = document.getElementById("InputRun").value;
    let inp5 = document.getElementById("InputCorreo").value;
    let inp6 = document.getElementById("InputTelefono").value;
    let inp7 = document.getElementById("GradeInput").value;
    let inp8 = document.getElementById("select-run").value;

    if(inp1 == "" && inp2 == "" && inp3 == "" && inp4 == "" && inp5 == "" && inp6 == "" && inp7 == "" && inp8 == ""){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>Los campos estan vacios</li>
                    </ul>
                </div>                
            `;
        document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    }else if(!Fn.validaRut(inp4)&&inp4!=""){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>El Rut no es valido</li>
                    </ul>
                </div>                
            `;
            document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    }
}

//-----------------------------------------------------------------------------

function isValidFormUsuarios(){
    let send = document.getElementById("send");
    let inp1 = document.getElementById("InputUser").value;
    let inp2 = document.getElementById("InputUsername").value;
    let inp3 = document.getElementById("InputEmail").value;
    let inp4 = document.getElementById("InputPassword1").value;
    
    let rbtn1 = document.getElementById("Radios1");
    let rbtn2 = document.getElementById("Radios2");

    if(inp1 == "" && inp2 == "" && inp3 == "" && inp4 == "" &&(!rbtn1.checked&&!rbtn2.checked)){
        let htmlstr = 
            `
                <div class='alert alert-danger'>
                    <ul class='list-unstyled mb-0'>
                        <li>Los campos estan vacios</li>
                    </ul>
                </div>                
            `;
        document.getElementById("errors").innerHTML = htmlstr; 
        return false;
    }else{
        document.getElementById("errors").innerHTML = ''; 
    }
    
}

//-----------------------------------------------------------------------------

var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut : function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐","-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto )){
            return false;
        }
        var tmp 	= rutCompleto.split('-');
        var digv	= tmp[1]; 
        var rut 	= tmp[0];
        if ( digv == 'K' ) {
           digv = 'k' ; 
        }
        return (Fn.dv(rut) == digv );
    },
    dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
            S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
    }
}

