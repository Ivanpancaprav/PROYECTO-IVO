import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PacienteComponent } from './paciente/paciente.component';

const routes: Routes = [
    {path: 'paciente', component: PacienteComponent},
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PacientesRoutingModule { }