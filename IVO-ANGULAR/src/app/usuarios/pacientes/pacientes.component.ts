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
  //  pacientes?: Paciente[];
  pacientes: any;

   public mensajeErr: string;
   dtOptions: DataTables.Settings ={};
   public mostrarTabla: boolean;
 
  
  constructor(private usuarios_service:UsuariosServiceService){
    this.mensajeErr ='';
    this.mostrarTabla = false;
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

    obtenerPacientes(): void {

      this.usuarios_service.getPacientes().subscribe(
        result =>{
          this.pacientes = result;
          console.log(this.pacientes);
          this.mostrarTabla = true;
         
        },
        error =>{
          this.mensajeErr="";
          if(error instanceof ErrorEvent){
            this.mensajeErr =error.error.message;
          }else if(error.status == 404){
            this.mensajeErr = "Error 404"
          }else{
            this.mensajeErr = "Error status:"+error.status;
          }
          this.mostrarTabla = true;
        }
      );
    }

    ngOnInit(): void {

      this.dtOptions = {
        
        lengthMenu:[10],
        processing: true,
        serverSide: false,
        pagingType: 'full_numbers',
        language: {
          processing: "Procesando...",
          lengthMenu: "Mostrar _MENU_ registros",
          zeroRecords: "No se encontraron resultados",
          emptyTable: "Ningún dato disponible en esta tabla",
          infoEmpty: "Mostrando los registros del 0 al 0 de un total de 0 registros",
          infoFiltered: "(Filtrado de un total de _MAX_ registros)",
          search: "Buscar:",
          loadingRecords: "Cargando...",
          paginate:{
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
          },
          info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
       
        },
        
      };
      this.obtenerPacientes();
    }


}

