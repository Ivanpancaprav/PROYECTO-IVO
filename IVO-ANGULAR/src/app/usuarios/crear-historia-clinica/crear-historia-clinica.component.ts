import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastrService } from 'ngx-toastr';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { UsuariosServiceService } from '../usuarios-service.service';
import { historias_clinicas } from 'src/app/models/historias_clinicas.model';
import { data } from 'jquery';


@Component({
  selector: 'app-crear-historia-clinica',
  templateUrl: './crear-historia-clinica.component.html',
  styleUrls: ['./crear-historia-clinica.component.css']
})
export class CrearHistoriaClinicaComponent {

  formularioHistoria = new FormGroup({
    tratamiento: new FormControl('',Validators.required),
    progreso:new FormControl('',Validators.required),
    fecha: new FormControl(new Date()),
    fecha2: new FormControl(new Date()),

  });
  public dni_paciente:any;
  public historiaclinica: historias_clinicas;

  constructor(private toast: ToastrService, private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute,private route: Router,private token: TokenStorageService){

   this.historiaclinica = new historias_clinicas(0,'','',new Date(),new Date(),0,0);
    
  
    this.dni_paciente = this.aRoute.snapshot.paramMap.get('dni_paciente');
    

  }


  onSubmit(){
   
     
    if(this.formularioHistoria.valid){
    
      this.historiaclinica.tratamiento= this.formularioHistoria.value.tratamiento!;
      this.historiaclinica.progreso = this.formularioHistoria.value.progreso!;
      this.historiaclinica.fecha_inicio = this.formularioHistoria.value.fecha!;
      this.historiaclinica.fecha_fin= this.formularioHistoria.value.fecha2!;
      this.historiaclinica.dni_paciente = this.dni_paciente;
      this.historiaclinica.dni_medico  = this.token.getUser().success.dni;
      console.log(this.historiaclinica);

      this.usuarios_service.historia_create(this.historiaclinica).subscribe(
        result => {
       

        },
        error =>{
    
        }
      )

    }
  }

  }