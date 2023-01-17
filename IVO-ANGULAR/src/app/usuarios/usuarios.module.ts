import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
import { CitapreviaComponent } from './citaprevia/citaprevia.component';



@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    PacientesComponent,
    HistorialComponent,
    CitapreviaComponent
  ],
  imports: [
    CommonModule
  ]
})
export class UsuariosModule { }
