import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { PacienteComponent } from './paciente/paciente.component';


@NgModule({
  declarations: [
    PacienteComponent
  ],
  imports: [
    CommonModule,
    RouterModule

  ]
})
export class PacientesModule { }
