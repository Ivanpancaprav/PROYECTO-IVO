import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import { ActivatedRoute } from '@angular/router';
import { Citas } from 'src/app/models/cita.model';
import { TokenStorageService } from 'src/app/_services/token-storage.service';

@Component({
  selector: 'app-citas',
  templateUrl: './citas.component.html',
  styleUrls: ['./citas.component.css'],
})
export class CitasComponent implements OnInit {
  public citas: any;
  public mensajeErr: string;
  dtOptions: DataTables.Settings = {};
  public mostrarTabla: boolean;
  public fecha = new Date();
  public medico = false;
  public paciente = false;
  public user: any;
  constructor(
    private usuarios_service: UsuariosServiceService,
    private aRoute: ActivatedRoute,
    private token: TokenStorageService
  ) {
    this.mensajeErr = '';
    this.mostrarTabla = false;
    this.user = token.getUser();

    switch (this.user.success.role) {
      case 'paciente':
        this.paciente = true;
        break;
      case 'medico':
        this.medico = true;
        break;
    }
  }
  // FUNCION QUE NOS DEVUELVE EL RESULTADO DEL SERVICIO GET PACIENTES,
  // O SEA, TODOS LOS PACIENTES

  obtenerCitas(tipo: number): void {
    this.usuarios_service.getCitas(tipo).subscribe(
      (result) => {
        this.citas = result;
        this.mostrarTabla = true;
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
        this.mostrarTabla = true;
      }
    );
  }

  onDialogOKSelected(
    id_cita: number,
    event: { dialog: { close: () => void } }
  ) {
    event.dialog.close();
    this.onSubmit(id_cita);
  }

  eliminarCita(id_cita: number){
    this.usuarios_service.citaDelete(id_cita).subscribe(

      result =>{
        console.log("Cita Borrada Con exito");
      },
      error =>{
        console.log("ERROR");
      }
    );
  }

  ngOnInit(): void {
    this.dtOptions = {
      lengthMenu: [10],
      processing: true,
      serverSide: false,
      pagingType: 'full_numbers',
      language: {
        processing: 'Procesando...',
        lengthMenu: 'Mostrar _MENU_ registros',
        zeroRecords: 'No se encontraron resultados',
        emptyTable: 'Ningún dato disponible en esta tabla',
        infoEmpty:
          'Mostrando los registros del 0 al 0 de un total de 0 registros',
        infoFiltered: '(Filtrado de un total de _MAX_ registros)',
        search: 'Buscar:',
        loadingRecords: 'Cargando...',
        paginate: {
          first: 'Primero',
          last: 'Último',
          next: 'Siguiente',
          previous: 'Anterior',
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      },
    };

    this.obtenerCitas(0);
  }

  onSubmit(id_cita: number) {
    this.eliminarCita(id_cita);
  }
}
