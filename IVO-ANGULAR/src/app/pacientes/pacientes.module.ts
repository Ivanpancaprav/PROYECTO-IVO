import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PacientesRoutingModule } from './pacientes-routing.module';
import { PacienteComponent } from './paciente/paciente.component';
import { RouterModule } from '@angular/router';


@NgModule({
  declarations: [
    PacienteComponent
  ],
  imports: [
    CommonModule,
    PacientesRoutingModule,
    RouterModule

  ]
})
export class PacientesModule { }
