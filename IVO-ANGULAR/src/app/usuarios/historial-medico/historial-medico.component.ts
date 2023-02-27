import { Component, OnInit } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import  {HttpClient} from '@angular/common/http';
import { ToastrService } from 'ngx-toastr';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Token } from '@angular/compiler';

@Component({
  selector: 'app-historial-medico',
  templateUrl: './historial-medico.component.html',
  styleUrls: ['./historial-medico.component.css']
})

  export class HistorialMedicoComponent implements OnInit  {

    public id: string | null;
    public titulo: string;
    public subtitulo: string;
    public historias_clinicas: any;
    public medico: boolean;
   
    public mensajeErr: string;
    public cargando = false;
    public perfil: any;
    dtOptions: DataTables.Settings ={};
    public mostrarTabla: boolean;
dialog: any;
  toast: any;
   
    constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute, private router: Router, private token: TokenStorageService){
      this.mensajeErr ='';
      this.mostrarTabla = false;
      this.medico = false;
      this.id = this.aRoute.snapshot.paramMap.get('dni_paciente');
      this.titulo = "Consultar Empleado";
      this.subtitulo = "Datos del Empleado";

      if(this.token.getUser().success.role == 'medico'){
        this.medico = true;
      }
    }
    // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
    // O SEA, TODOS LOS PACIENTES
    
    obtenerPaciente(dni:string) {

        this.usuarios_service.getPerfil(dni).subscribe(
    
          result =>{
            this.perfil = result;
            console.log(this.perfil);
          },
          error =>{
            this.mensajeErr ="";
            if(error instanceof ErrorEvent){
              this.mensajeErr = error.error.message;

            }else if(error.status == 404){
              this.mensajeErr ="Error 404"
    
            }else{
              this.mensajeErr ="Error status: "+error.status;
            }
          }
        );
        }
    
    obtenerHistorias_clinicas(dni:string): void {
      
      this.usuarios_service.getHistorias(dni).subscribe(
        result =>{

          this.historias_clinicas = result;
          console.log (this.historias_clinicas);
          this.cargando = false;
          this.mostrarTabla = true;
        },
        error =>{

          this.mensajeErr="";
          this.cargando = false;
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

        this.obtenerPaciente(this.id!);
        this.obtenerHistorias_clinicas(this.id!);
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
      }

      // eliminarHistorial(id: string) {
      
   
      //   this.usuarios_service.borrarHistorias_clinicas(id).subscribe(
      //       result => {
      //         this.cargando = false;
      //         console.log("Empleado eliminado con éxito");
      //        this.toastr.success('Dato eliminado con éxito!!', 'Eliminado empleado', {positionClass: 'toast-bottom-right', timeOut:2000});
      //         this.getEmpleados();
      //         console.log("VOLVEMOS AL LISTADO DE EMPLEADOS, ERA UN BORRADO")
      //       },
      //       error => {
      //         this.cargando = false;
      //         this.mensajeErr = '';
      //         if (error instanceof ErrorEvent) {
      //           this.mensajeErr = error.error.message;
      //         }
      //         else if (error.status == 404) {
      //           this.mensajeErr = "Error 404"
      //         } else {
      //           this.mensajeErr = "Error status:" + error.status;
      //         }
      //         console.log(this.mensajeErr);
      //       }
      //     );
      // }

      eliminarHistorial(id: string){
        this.usuarios_service.borrarHistorias_clinicas(id).subscribe(
    
          result =>{
            this.toast.success('Historia borrarada con éxito','Historia');
          },
          error =>{
            console.log("ERROR");
          }
        );
      }
    
    
      onSubmit() {
  
          this.eliminarHistorial(this.id!);
          setTimeout(() =>{this.router.navigate(['/borrarMedicamentos']);}, 500);
      }
  }
  
  
  

