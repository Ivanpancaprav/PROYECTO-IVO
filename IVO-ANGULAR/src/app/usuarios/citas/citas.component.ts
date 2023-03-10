import { Component, OnInit, Inject } from '@angular/core';
import { UsuariosServiceService } from '../usuarios-service.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Citas } from 'src/app/models/cita.model';
import { TokenStorageService } from 'src/app/_services/token-storage.service';
import { ToastrService } from 'ngx-toastr';
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
    private token: TokenStorageService,
    private toast: ToastrService,
    private router: Router
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

  obtenerCitas(tipo: number,dni: string,role: string): void {
    this.usuarios_service.getCitas(tipo,dni,role).subscribe(
      (result) => {
        this.citas = result;
        this.mostrarTabla = true;
        console.log(this.citas);
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
        this.toast.success('Cita borrarada con ??xito','Cita');
      },
      error =>{
        console.log("ERROR");
      }
    );
  }

  ngOnInit(): void {
    this.dtOptions = {
      lengthMenu: [5],
      processing: true,
      serverSide: false,
      pagingType: 'full_numbers',
      language: {
        processing: 'Procesando...',
        lengthMenu: 'Mostrar _MENU_ registros',
        zeroRecords: 'No se encontraron resultados',
        emptyTable: 'Ning??n dato disponible en esta tabla',
        infoEmpty:
          'Mostrando los registros del 0 al 0 de un total de 0 registros',
        infoFiltered: '(Filtrado de un total de _MAX_ registros)',
        search: 'Buscar:',
        loadingRecords: 'Cargando...',
        paginate: {
          first: 'Primero',
          last: '??ltimo',
          next: 'Siguiente',
          previous: 'Anterior',
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
      },
    };

    this.obtenerCitas(0,this.token.getUser().success.dni,this.token.getUser().success.role);
  }

  redirectTo(uri:string){
    this.router.navigateByUrl('/', {skipLocationChange: true}).then(()=>
    this.router.navigate([uri]));
 }
  onSubmit(id_cita: number) {
    this.eliminarCita(id_cita);
    this.redirectTo('citas');
  }
}
