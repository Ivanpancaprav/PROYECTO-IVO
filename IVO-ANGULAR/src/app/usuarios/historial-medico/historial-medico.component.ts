import { Component, OnInit } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import  {HttpClient} from '@angular/common/http';
import { ToastrService } from 'ngx-toastr';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-historial-medico',
  templateUrl: './historial-medico.component.html',
  styleUrls: ['./historial-medico.component.css']
})

  export class HistorialMedicoComponent implements OnInit  {
    currentUser: any;
    public op: number;
    public id: string | null;
    public titulo: string;
    public subtitulo: string;
    public historias_clinicas: any;
   
    public mensajeErr: string;
    public cargando = false;

    dtOptions: DataTables.Settings ={};
    public mostrarTabla: boolean;
   
    constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute, private token: TokenStorageService, private router: Router){
      this.mensajeErr ='';
      this.mostrarTabla = false;
      this.id = this.aRoute.snapshot.paramMap.get('id');
     
      this.op = Number(this.aRoute.snapshot.paramMap.get('op'));
      this.titulo = "Consultar Empleado";
      this.subtitulo = "Datos del Empleado";
    }
    // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
    // O SEA, TODOS LOS PACIENTES
  
    obtenerHistorias_clinicas(): void {
  
      this.usuarios_service.getHistorias_clinicas().subscribe(
        result =>{
          this.historias_clinicas = result;
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
        if (this.op == 1) {
          this.titulo = "Borrar Empleado";
          this.subtitulo = "Confirmación del borrado del Empleado";
          
        }
  
        this.obtenerHistorias_clinicas();
       
 
        this.currentUser = this.token.getUser();
        
       
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


      eliminarHistorial(id: string) {
      
   
        this.usuarios_service.borrarHistorias_clinicas(id).subscribe(
            result => {
              this.cargando = false;
              // console.log("Empleado eliminado con éxito");
             // this.toastr.success('Dato eliminado con éxito!!', 'Eliminado empleado', {positionClass: 'toast-bottom-right', timeOut:2000});
              // this.getEmpleados();
              // console.log("VOLVEMOS AL LISTADO DE EMPLEADOS, ERA UN BORRADO")
            },
            error => {
              this.cargando = false;
              this.mensajeErr = '';
              if (error instanceof ErrorEvent) {
                this.mensajeErr = error.error.message;
              }
              else if (error.status == 404) {
                this.mensajeErr = "Error 404"
              } else {
                this.mensajeErr = "Error status:" + error.status;
              }
              console.log(this.mensajeErr);
            }
          );
      }
    
  
      onSubmit() {
        if (this.op == 1) {
          this.eliminarHistorial(this.id!);
          setTimeout(() =>{this.router.navigate(['/borrarMedicamentos']);}, 500);
        }else this.router.navigate(['/borrarMedicamentos']);
        // console.log("VOLVEMOS AL LISTADO DE EMPLEADOS, ERA UNA CONSULTA")
      }

    
   
   
  
  }
  
  
  

