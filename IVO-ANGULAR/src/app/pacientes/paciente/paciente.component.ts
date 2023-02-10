import { Component, OnInit } from '@angular/core';
import  {HttpClient} from '@angular/common/http';
import { ActivatedRoute } from '@angular/router';
import { UsuariosServiceService } from 'src/app/usuarios/usuarios-service.service';
import { switchMap } from 'rxjs/operators';
@Component({
  selector: 'app-paciente',
  templateUrl: './paciente.component.html',
  styleUrls: ['./paciente.component.css']
})
export class PacienteComponent {
  public perfil: any;
  public mensajeErr: string;
  public dni: string | null;
  public hayPerfil: boolean;
  constructor(private usuarios_service:UsuariosServiceService, private Http: HttpClient, private aRoute: ActivatedRoute){
    this.dni = this.aRoute.snapshot.paramMap.get('dni');
    this.mensajeErr ='';
    this.hayPerfil = false;
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES
  
  obtenerPerfil(dni: any) {

    this.usuarios_service.getPerfil(dni).subscribe(

      result =>{
        this.perfil = result;
        console.log(this.perfil);
        this.hayPerfil = true;
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
    ngOnDestroy() {
      this.perfil.unsubscribe();
    }

}