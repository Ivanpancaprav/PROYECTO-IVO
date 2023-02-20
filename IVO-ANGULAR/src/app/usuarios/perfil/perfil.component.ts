import { Component, OnInit } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import  {HttpClient} from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { TokenStorageService } from 'src/app/_services/token-storage.service';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit  {
  public perfil: any;
  public mensajeErr: string;
  public dataTable: any;
  public dni: string | null;
  dtOptions: DataTables.Settings = {};

  constructor(private usuarios_service:UsuariosServiceService, private Http: HttpClient, private aRoute: ActivatedRoute, private token: TokenStorageService){

    this.dni = this.aRoute.snapshot.paramMap.get('dni');
    this.mensajeErr ='';
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES
  obtenerPerfil(dni: any) {
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

    ngOnInit(): void {
      this.obtenerPerfil(this.dni);
    }


}


