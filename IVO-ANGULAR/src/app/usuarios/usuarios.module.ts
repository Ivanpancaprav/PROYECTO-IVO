import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
import { CitapreviaComponent } from './citaprevia/citaprevia.component';
import { RouterModule } from '@angular/router';
import { SolicitarCitaComponent } from './solicitar-cita/solicitar-cita.component';
import { ModificarCitaComponent } from './modificar-cita/modificar-cita.component';


@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    PacientesComponent,
    HistorialComponent,
    CitapreviaComponent,
    SolicitarCitaComponent,
    ModificarCitaComponent
  ],
  imports: [
    CommonModule,
    RouterModule
  ]
})
export class UsuariosModule { }
