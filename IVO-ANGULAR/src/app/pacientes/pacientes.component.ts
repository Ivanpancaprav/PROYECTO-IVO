import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService} from '../usuarios/usuarios-service.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-pacientes',
  templateUrl: './pacientes.component.html',
  styleUrls: ['./pacientes.component.css'],
})
export class PacientesComponent implements OnInit  {
  public pacientes: any;
  public perfil: any;
  public dni: string | null;
  public mensajeErr: string;
  dtOptions: DataTables.Settings ={};
  public mostrarTabla: boolean;
 
  
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute){
    this.dni = this.aRoute.snapshot.paramMap.get('dni');
    this.mensajeErr ='';
    this.mostrarTabla = false;
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

    obtenerPacientes(): void {

      this.usuarios_service.getPacientes().subscribe(
        result =>{
          this.pacientes = result;
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

    obtenerDatos(dni: any): void {

      this.usuarios_service.getPerfil(dni).subscribe(
        result =>{
          this.perfil = result;
          this.mostrarTabla = true;
          console.log(this.perfil);
         
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
      this.obtenerDatos(this.dni);
    }


}

