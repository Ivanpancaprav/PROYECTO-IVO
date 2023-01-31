import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http'

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit  {
  public perfil: any;
  public mensajeErr: string;
  public dataTable: any;
  dtOptions: DataTables.Settings = {};

  constructor(private usuarios_service:UsuariosServiceService, private Http: HttpClient){
    this.mensajeErr ='';
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES
  obtenerPerfil() {

    this.usuarios_service.getPerfil().subscribe(

      result =>{
        this.perfil = result;

        //AQUI HACEMOS SINCRONO
        // const table: any = $('table');
        // this.dataTable = table.DataTable();
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

    ngOnInit(): void {
      this.obtenerPerfil();
    }


}


