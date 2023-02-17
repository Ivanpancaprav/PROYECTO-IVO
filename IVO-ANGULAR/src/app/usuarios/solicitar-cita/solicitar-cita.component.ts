import { Component, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { IgxCalendarComponent } from 'igniteui-angular';
import { UsuariosServiceService } from '../usuarios-service.service';
import { Citas } from 'src/app/models/cita.model';
import { FormControl, FormGroup, Validators } from '@angular/forms';


@Component({
  selector: 'app-solicitar-cita',
  templateUrl: './solicitar-cita.component.html',
  styleUrls: ['./solicitar-cita.component.css']
})
export class SolicitarCitaComponent {

  formularioCita = new FormGroup({
    fecha_creacion: new FormControl(),
    fecha_fin: new FormControl('',Validators.required),
    especialidad: new FormControl('',Validators.required),
    descripcion: new FormControl('',[Validators.required,Validators.maxLength(200)]),
    dni_medico: new FormControl('',Validators.required),
    dni_paciente: new FormControl('',Validators.required),
  });


  @ViewChild('calendar', { static: true })
  public calendar!: IgxCalendarComponent;

  protected medicos: any;
  protected mensajeErr: any;
  protected selectedTeam: string;
  protected cita: Citas;

  protected fecha: Date;
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute){
    this.selectedTeam ="";
    this.fecha = new Date();
    this.cita = new Citas(new Date(),new Date(),"","","","");
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

  public onSelection(dates: Date | Date[]) {
   
    dates = dates as Date;
    // console.log((dates.getMonth()+1));

  this.fecha = new Date(dates.getFullYear(),(dates.getMonth()+1),dates.getDate()); 

  }


  onSubmit(){
    if(this.formularioCita.valid){

      this.cita.fecha_creacion = new Date();
      this.cita.fecha_fin = this.fecha;
      this.cita.descripcion = this.formularioCita.value.descripcion!;
      this.cita.especialidad = this.formularioCita.value.especialidad!;
      this.cita.dni_medico = this.formularioCita.value.dni_medico!;
      this.cita.dni_paciente = this.formularioCita.value.dni_paciente!;

      this.usuarios_service.crearCita(this.cita).subscribe(
        result => {
          console.log("cita creada con exito");
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


  }

