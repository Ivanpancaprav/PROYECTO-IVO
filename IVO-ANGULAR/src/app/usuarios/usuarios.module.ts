import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
<<<<<<< HEAD
import { DataTablesModule } from "angular-datatables";
=======
import { CitapreviaComponent } from './citaprevia/citaprevia.component';
import { RouterModule } from '@angular/router';
>>>>>>> cc21e21bc496cfd2a390b9c118c7c61dbcfd2561


@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    PacientesComponent,
    HistorialComponent,
    CitapreviaComponent
  ],
  imports: [
    CommonModule,
<<<<<<< HEAD
    DataTablesModule
=======
    RouterModule
>>>>>>> cc21e21bc496cfd2a390b9c118c7c61dbcfd2561
  ]
})
export class UsuariosModule { }
