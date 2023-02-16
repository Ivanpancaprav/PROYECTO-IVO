import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { UsuariosServiceService } from '../usuarios-service.service';

@Component({
  selector: 'app-solicitar-cita',
  templateUrl: './solicitar-cita.component.html',
  styleUrls: ['./solicitar-cita.component.css']
})
export class SolicitarCitaComponent {

  protected medicos: any;
  protected mensajeErr: any;
  protected selectedTeam: string;
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute){
    this.selectedTeam ="";
  }

  ngOnInit(){
    this.getMedicos();
  }

  onSelected(especialidad: string):void{
    this.selectedTeam = especialidad;
    console.log(this.selectedTeam);
  }

  getMedicos(){
    
    this.usuarios_service.getMedicos().subscribe(
      result =>{
        this.medicos = result;
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
        
      }
    );
  }

  }

