import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
import { DataTablesModule } from "angular-datatables";


@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    PacientesComponent,
    HistorialComponent
  ],
  imports: [
    CommonModule,
    DataTablesModule
  ]
})
export class UsuariosModule { }
