import { Component, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Citas } from 'src/app/models/cita.model';
import { UsuariosServiceService } from '../usuarios-service.service';
import { IgxCalendarComponent } from 'igniteui-angular';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-gestionar-cita-med',
  templateUrl: './gestionar-cita-med.component.html',
  styleUrls: ['./gestionar-cita-med.component.css'],
})
export class GestionarCitaMedComponent {

  formularioCita = new FormGroup({
    fecha_creacion: new FormControl(new Date()),
    especialidad: new FormControl('',Validators.required),
    descripcion: new FormControl('',[Validators.required,Validators.maxLength(200)]),
    dni_medico: new FormControl('',Validators.required),
    hora: new FormControl('',Validators.required),
    fecha: new FormControl('',Validators.required),

  });
  
  @ViewChild('calendar', { static: true })
  public calendar!: IgxCalendarComponent;

  protected selectedTeam: string;
  protected medicoSelec: string;
  // protected dni_paciente: string | null;
  protected fecha: Date;

  public cita: any;
  public id_cita: any;
  public mensajeErr: string;
  public nombre_medico: string;
  protected nueva_cita: Citas;
  public medicos: any;

  constructor(private usuarios_service: UsuariosServiceService,private aRoute: ActivatedRoute,private token: TokenStorageService, private toast: ToastrService,private router: Router ) {
    
    this.id_cita = this.aRoute.snapshot.paramMap.get('id_cita');
    this.nombre_medico = '';
    this.mensajeErr = '';
    this.selectedTeam = '';
    this.medicoSelec = '';
    this.fecha = new Date();
    this.nueva_cita = new Citas(new Date(), new Date(), '', '', '', '');
    this.cita = new Citas(new Date(), new Date(), '', '', '', '');
  }


  public onDialogOKSelected(event: { dialog: { close: () => void; }; }) {
    event.dialog.close();
    this.onSubmit();
}


  onSelected(especialidad: string): void {
    this.selectedTeam = especialidad;
    console.log(this.selectedTeam);
  }
  public onSelection(dates: Date | Date[]) {
    dates = dates as Date;
  
    this.fecha = new Date(dates);
    console.log(this.fecha);
    this.formularioCita.get('fecha')?.setErrors(null);
  }

  onSeleccion(dni_medico: string): void {
    this.medicoSelec = dni_medico;
  }

  getCita(id_cita: number): void {
    this.usuarios_service.getCita(id_cita).subscribe(
      (result) => {
        this.cita = result[0];
        this.nombre_medico = result.nombre_medico; 
        this.nueva_cita = this.cita;

      },
      (error) => {
        this.mensajeErr = '';
        if (error instanceof ErrorEvent) {
          this.mensajeErr = error.error.message;
        } else if (error.status == 404) {
          this.mensajeErr = 'Error 404';
        } else {
          this.mensajeErr = 'Error status:' + error.status;
        }
      }
    );
  }

  getMedicos(){
    
    this.usuarios_service.getMedicos().subscribe(
      result =>{
        this.medicos = result;
        console.log(this.medicos);
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

  ngOnInit(): void {
    this.getCita(this.id_cita);
    this.getMedicos();
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
