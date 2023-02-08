import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PacienteComponent } from './paciente/paciente.component';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  {
    path: 'paciente',
    component: PacienteComponent
  }
];

@NgModule({
  declarations: [
    PacienteComponent
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  exports: [RouterModule]
})
export class PacientesModule { }