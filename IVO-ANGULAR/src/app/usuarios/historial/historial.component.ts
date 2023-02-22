
import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-pacientes',
  templateUrl: './historial.component.html',
  styleUrls: ['./historial.component.css'],
})
export class HistorialComponent implements OnInit  {

  public medicamentos: any;
  public informes: any;
  public historia: any;
  public txBoton: string;
  public progreso: string;
  public mensajeErr: string;
  dtOptions: DataTables.Settings ={};
  public mostrarTabla: boolean;
  public fecha = new Date();
  public n_historia: number;
  
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute){
    this.mensajeErr ='';
    this.progreso ='';
    this.txBoton = "Volver";
    this.n_historia = parseInt(this.aRoute.snapshot.paramMap.get('n_historia')!);
    this.mostrarTabla = false;
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

  obtenerHistoria(n_historia: number): void{
    this.usuarios_service.getHistoria(n_historia).subscribe(
      result =>{

        this.medicamentos = result;
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

  obtenerMedicamentos(n_historia: number): void {

    this.usuarios_service.get_med_in_historia(n_historia).subscribe(
      result =>{

        this.medicamentos = result[0];
        this.progreso =result['progreso'];
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

  obtenerInformes(): void {

    this.usuarios_service.getInformes().subscribe(
      result =>{
      
        this.informes = result;
        console.log(this.informes);

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

      this.obtenerMedicamentos(this.n_historia);
      this.obtenerInformes();
      // this.obtenerHistorias_clinicas();
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

