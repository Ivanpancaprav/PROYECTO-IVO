import { Component } from '@angular/core';

@Component({
  selector: 'app-crear-historia-clinica',
  templateUrl: './crear-historia-clinica.component.html',
  styleUrls: ['./crear-historia-clinica.component.css']
})
export class CrearHistoriaClinicaComponent {

}


  onSubmit(){
   
     
    if(this.formularioHistoria.valid){
    
      this.historiaclinica.tratamiento= this.formularioHistoria.value.tratamiento!;
      this.historiaclinica.progreso = this.formularioHistoria.value.progreso!;
      this.historiaclinica.fecha_inicio = this.formularioHistoria.value.fecha!;
      this.historiaclinica.fecha_fin= this.formularioHistoria.value.fecha2!;
      this.historiaclinica.dni_paciente = this.dni_paciente;
      this.historiaclinica.dni_medico  = this.token.getUser().success.dni;
      console.log(this.historiaclinica);

      this.usuarios_service.historia_create(this.historiaclinica).subscribe(
        result => {
       

        },
        error =>{
    
        }
      )

    }
  }

  }