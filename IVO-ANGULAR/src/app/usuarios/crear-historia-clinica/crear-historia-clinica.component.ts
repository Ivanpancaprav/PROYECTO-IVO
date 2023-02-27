import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
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

       
     formularioCita  = new FormGroup({
      tratamiento: new FormControl('', [Validators.required,]),
      fecha_inicio: new FormControl('', [Validators.required]),
      dni_paciente: new FormControl('', [Validators.required]),
      progreso: new FormControl('', [Validators.required]),
      
    });


  public fecha: any;
  public historia: any;
  router: any;
  mensajeErr: string | undefined;
  // public  dni_paciente: string | null;
  public selectedTeam: string;
 
  constructor(private toast: ToastrService, private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute,private route: Router,private token: TokenStorageService){
    this.selectedTeam ="";
   
    // this.dni_paciente = this.aRoute.snapshot.paramMap.get('dni_paciente');
    this.fecha = new Date();
    
  }

    ngOnInit(): void {
     
    }

    onSelected(tratamiento: string):void{
      this.selectedTeam = tratamiento;
     
    }

    onSubmit() { 
     
        
      
      if (this.formularioCita.valid) {
        console.log("tratamiento",this.formularioCita.value.tratamiento);
        console.log("fecha_inicio",this.formularioCita.value.fecha_inicio); 
        console.log("dni_paciente",this.formularioCita.value.dni_paciente);
        console.log("dni_paciente",this.formularioCita.value.progreso);
       
        this.usuarios_service.historia_create(this.formularioCita.value.tratamiento!, this.formularioCita.value.fecha_inicio!, this.formularioCita.value.dni_paciente!,this.formularioCita.value.progreso! ).subscribe(
          result => {
            this.toast.success('La historia ha sido guardada con éxito','Historia Clinica');
            this.route.navigate(['/historial']);
      
          },
          error =>{
            this.mensajeErr = '';
            if (error instanceof ErrorEvent) {
              this.mensajeErr = error.error.message;
            }
            else if (error.status == 409) {
              this.mensajeErr = "La historia ya existe"
            } else {
              this.mensajeErr = "Error status:" + error.status;
            }
          }
        )
      }
      console.log(this.formularioCita);
    
   

  }

}
  

