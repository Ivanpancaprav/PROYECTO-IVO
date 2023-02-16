import { Component, Input, OnInit } from '@angular/core';
import  {HttpClient} from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { UsuariosServiceService } from 'src/app/usuarios/usuarios-service.service';
import { switchMap } from 'rxjs/operators';
import { Paciente } from 'src/app/models/paciente.model';
@Component({
  selector: 'app-paciente',
  templateUrl: './paciente.component.html',
  styleUrls: ['./paciente.component.css']
})
export class PacienteComponent {

 
  constructor(){}
  
    @Input() paciente: any;  


  ngOnInit(): void{
    console.log(this.paciente);
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES
  
  // obtenerPerfil(dni: string) {

  //     console.log(dni);
  //   this.usuarios_service.getPerfil(dni).subscribe(

  //     result =>{
  //       this.perfil = result;
  //       console.log(this.perfil);
  //       this.hayPerfil = true;
  //     },
  //     error =>{
  //       this.mensajeErr ="";
  //       if(error instanceof ErrorEvent){
  //         this.mensajeErr = error.error.message;

  //       }else if(error.status == 404){
  //         this.mensajeErr ="Error 404"

  //       }else{
  //         this.mensajeErr ="Error status: "+error.status;
  //       }
  //     }
  //   );
  //   }
}