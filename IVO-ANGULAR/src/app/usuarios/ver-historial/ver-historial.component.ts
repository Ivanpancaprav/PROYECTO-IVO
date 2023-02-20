import { Component } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import { ActivatedRoute } from '@angular/router';
import { thisMonth } from '@igniteui/material-icons-extended';

@Component({
  selector: 'app-pacientes',
  templateUrl: './ver-historial.component.html',
  styleUrls: ['./ver-historial.component.css'],
})
export class VerHistorialComponent {


  public informe: any;
  public esAnilitica: boolean;
  public txBoton: string;
  public mensajeErr: string;
  dtOptions: DataTables.Settings ={};
  public mostrarTabla: boolean;
  public fecha = new Date();
  public id: any;
  
   
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute){
    this.id = this.aRoute.snapshot.paramMap.get('id_informe');
    this.mensajeErr ='';
    this.txBoton = "Volver"
    this.mostrarTabla = false;
    this.esAnilitica  = false;
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

  obtenerInforme(id: number): void {

    this.usuarios_service.getInforme(id).subscribe(
      result =>{
      
        this.informe = result[0];
        console.log(this.informe.observaciones);


        // switch(this.informes.)

        // this.mostrarTabla = true;
      
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
      this.obtenerInforme(this.id);
      this.txBoton = "BORRAR"

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

}

