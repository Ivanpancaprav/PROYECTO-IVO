import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Citas } from 'src/app/models/cita.model';
import { UsuariosServiceService } from '../usuarios-service.service';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-crear-historia-clinica',
  templateUrl: './crear-historia-clinica.component.html',
  styleUrls: ['./crear-historia-clinica.component.css']
})
export class CrearHistoriaClinicaComponent {

      formularioCita = new FormGroup({
      fecha_creacion: new FormControl(new Date()),
      Tratamiento: new FormControl('',Validators.required),
  
    });    


  public fecha: any;
  public historia: any;
  router: any;
  mensajeErr: string | undefined;
  public  dni_paciente: string | null;
  public  tratamiento: string;
  public selectedTeam: string;
 
  constructor(private toast: ToastrService, private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute,private route: Router,private token: TokenStorageService){
    this.selectedTeam ="";
    this.tratamiento ="";
   
    this.dni_paciente = this.aRoute.snapshot.paramMap.get('dni_paciente');
    this.fecha = new Date();
    
  }

    ngOnInit(): void {
     
    }

    onSelected(tratamiento: string):void{
      this.selectedTeam = tratamiento;
      console.log(this.selectedTeam);
    }

    onSubmit() {
  
      console.log(this.formularioCita);
    
   
      this.historia.fecha_creacion = new Date();
      this.historia.tratamiento = this.formularioCita.value.Tratamiento!;
      this.historia.dni_paciente =this.dni_paciente!;
  


      this.usuarios_service.historia_create(this.historia).subscribe(
        result => {
          this.toast.success('La historia ha sido guardada con éxito','Historias_clinicas');
          this.route.navigate(['/Historias_clinicas']);
    
        },
        error =>{
          this.mensajeErr = '';
          if (error instanceof ErrorEvent) {
            this.mensajeErr = error.error.message;
          }
          else if (error.status == 409) {
            this.mensajeErr = "Cita ya existe"
          } else {
            this.mensajeErr = "Error status:" + error.status;
          }
        }
      )
  }



  }
  

