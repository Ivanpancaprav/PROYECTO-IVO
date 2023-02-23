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
      especialidad: new FormControl('',Validators.required),
      descripcion: new FormControl('',[Validators.required,Validators.maxLength(200)]),
      dni_medico: new FormControl('',Validators.required),
      hora: new FormControl('',Validators.required),
      fecha: new FormControl('',Validators.required),
    });    

    public cita: any;
    public id_cita: any;
    public mensajeErr: string;
    public nombre_medico: string;
    public medicos: any;
  fecha: any;
  selectedTeam: any;
  medicoSelec: any;
  
    constructor(private usuarios_service: UsuariosServiceService,private aRoute: ActivatedRoute,private token: TokenStorageService, private toast: ToastrService,private router: Router ) {
      
      this.id_cita = this.aRoute.snapshot.paramMap.get('id_cita');
      this.nombre_medico = '';
      this.mensajeErr = '';;

      this.cita = new Citas(new Date(), new Date(), '', '', '', '');
    }

    ngOnInit(): void {
     
    }
  
    onSubmit() {
  
      console.log(this.formularioCita);
    
        let hora = parseInt(this.formularioCita.value.hora!);
        let minutos = parseInt((this.formularioCita.value.hora!).substring(3,5));
    
        this.cita.fecha_fin = new Date(this.fecha.getFullYear(),(this.fecha.getMonth()),(this.fecha.getDate()),(hora),(minutos),(0o0),(0o0));
        this.cita.descripcion = this.formularioCita.value.descripcion!;
        this.cita.especialidad = this.selectedTeam;
        this.cita.dni_medico = this.medicoSelec;
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
          }
        )
  
  }
  }
  

