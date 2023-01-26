import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import  {HttpClient, HttpHeaders, HttpResponse} from '@angular/common/http'

@Component({
  selector: 'app-pacientes',
  templateUrl: './pacientes.component.html',
  styleUrls: ['./pacientes.component.css'],
})
export class PacientesComponent  {
  // public pacientes: any;
  // public mensajeErr: string;
  // public dataTable: any;
  // dtOptions: DataTables.Settings = {};

  // constructor(private usuarios_service:UsuariosServiceService, private Http: HttpClient){
  //   this.mensajeErr ='';
  // }
  // // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // // O SEA, TODOS LOS PACIENTES
  // obtenerPacientes() {

  //   this.usuarios_service.getPacientes().subscribe(
  //     result =>{
  //       this.pacientes = result;

  //       //AQUI HACEMOS SINCRONO
  //       const table: any = $('table');
  //       this.dataTable = table.DataTable();
  //     },
  //     error =>{
  //       this.mensajeErr ="";
  //       if(error instanceof ErrorEvent){
  //         this.mensajeErr = error.error.message;

  //       }else if(error.status == 404){
  //         this.mensajeErr ="Error 404";

  //       }else{
  //         this.mensajeErr ="Error status: "+error.status;
  //       }
  //     }
  //   );
  //   }


  //   ngOnInit(): void {
  //     this.dtOptions = {
  //       ajax: (dataTablesParameters: any, callback) => {
  //         this.Http
  //           .post<DataTablesResponse>(
  //             'http://localhost/api/pacientes',
  //             dataTablesParameters, {}
  //           ).subscribe(resp => {
  //             callback({
  //               recordsTotal: resp.recordsTotal,
  //               recordsFiltered: resp.recordsFiltered,
  //               data: resp.data             // <-- see here
  //             });
  //           });
  //       },
  //       columns: [{
  //         title: 'ID',
  //         data: 'id'
  //       }, {
  //         title: 'First name',
  //         data: 'firstName'
  //       }, {
  //         title: 'Last name',
  //         data: 'lastName'
  //       }]
  //     };
  //   }
  // }


}
