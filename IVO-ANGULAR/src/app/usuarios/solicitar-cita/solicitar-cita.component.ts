import { Component, ViewChild } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { IgxCalendarComponent } from 'igniteui-angular';
import { UsuariosServiceService } from '../usuarios-service.service';
import { Citas } from 'src/app/models/cita.model';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { TokenStorageService } from 'src/app/_services/token-storage.service';


@Component({
  selector: 'app-solicitar-cita',
  templateUrl: './solicitar-cita.component.html',
  styleUrls: ['./solicitar-cita.component.css']
})
export class SolicitarCitaComponent {

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

  protected medicos: any;
  protected mensajeErr: any;
  protected selectedTeam: string;
  protected medicoSelec: string;
  protected cita: Citas;
  protected dni_paciente: string | null;

  protected fecha: Date;
  constructor(private usuarios_service:UsuariosServiceService, private aRoute: ActivatedRoute, private token: TokenStorageService){
    this.selectedTeam ="";
    this.medicoSelec ="";
    this.dni_paciente = this.aRoute.snapshot.paramMap.get('dni_paciente');
    
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

  onSeleccion(dni_medico: string):void{
    this.medicoSelec = dni_medico;
    console.log(this.medicoSelec);
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
    this.fecha = new Date(dates); 
    console.log(this.fecha);
    this.formularioCita.get('fecha')?.setErrors(null);
  }

  onSubmit(){
    
    if(this.formularioCita.valid){

      let hora = parseInt(this.formularioCita.value.hora!);
      let minutos = parseInt((this.formularioCita.value.hora!).substring(3,5));
      this.cita.fecha_creacion = new Date();
      this.cita.fecha_fin = new Date(this.fecha.getFullYear(),(this.fecha.getMonth()),(this.fecha.getDate()),(hora),(minutos),(0o0),(0o0));
      this.cita.descripcion = this.formularioCita.value.descripcion!;
      this.cita.especialidad = this.selectedTeam;
      this.cita.dni_medico = this.medicoSelec;
      this.cita.dni_paciente =this.dni_paciente!;

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
            this.mensajeErr = "Cita ya existe"
          } else {
            this.mensajeErr = "Error status:" + error.status;
          }
        }
      )

    }


  }


  }

