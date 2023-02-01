import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import { Paciente } from 'src/app/models/paciente.model';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http'


@Component({
  selector: 'app-pacientes',
  templateUrl: './pacientes.component.html',
  styleUrls: ['./pacientes.component.css'],
})
export class PacientesComponent implements OnInit  {
   pacientes?: Paciente[];
 
  
  constructor(private usuarios_service:UsuariosServiceService){

  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

  
  
    ngOnInit(): void {
      this.obtenerPacientes();
    }

    obtenerPacientes(): void {

      this.usuarios_service.getPacientes().subscribe({next: (data) =>{this.pacientes = data; console.log(data);
        
      },
      error: (e) => console.error(e)})

    }

}

