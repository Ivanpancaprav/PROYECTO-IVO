import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
import { CitapreviaComponent } from './citaprevia/citaprevia.component';
import { RouterModule } from '@angular/router';
<<<<<<< HEAD
import { DataTablesModule } from 'angular-datatables';
=======
import { SolicitarCitaComponent } from './solicitar-cita/solicitar-cita.component';
import { ModificarCitaComponent } from './modificar-cita/modificar-cita.component';
import { GestionarCitaMedComponent } from './gestionar-cita-med/gestionar-cita-med.component';


>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    PacientesComponent,
    HistorialComponent,
    CitapreviaComponent,
<<<<<<< HEAD
    
  ],
  imports: [
    CommonModule,
    RouterModule,
    DataTablesModule
=======
    SolicitarCitaComponent,
    ModificarCitaComponent,
    GestionarCitaMedComponent
  ],
  imports: [
    CommonModule,
    RouterModule
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
  ]
})
export class UsuariosModule { }
