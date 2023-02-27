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
    
<<<<<<< HEAD
        // this.cita.fecha_fin = new Date(this.fecha.getFullYear(),(this.fecha.getMonth()),(this.fecha.getDate()),(hora),(minutos),(0o0),(0o0));
        // this.cita.descripcion = this.formularioCita.value.descripcion!;
        // this.cita.especialidad = this.selectedTeam;
        // this.cita.dni_medico = this.medicoSelec;
        this.cita.dni_paciente =this.cita.dni_paciente
        console.log(this.cita);
        this.usuarios_service.citaUpdate(this.cita.id_cita,this.cita).subscribe(
          result => {
            this.toast.success('Cita modificada con éxito','Cita');
            this.router.navigate(['/citas']);
  
          },
          error =>{
            this.mensajeErr = '';
            if (error instanceof ErrorEvent) {
              this.mensajeErr = error.error.message;
            }
            else if (error.status == 409) {
              this.mensajeErr = "Empleado ya existe"
            } else {
              this.mensajeErr = "Error status:" + error.status;
            }
=======
        },
        error =>{
          this.mensajeErr = '';
          if (error instanceof ErrorEvent) {
            this.mensajeErr = error.error.message;
>>>>>>> d2020b498830d19247390a65692f5687d20421e9
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
  

