import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { GestionarCitaMedComponent } from './usuarios/gestionar-cita-med/gestionar-cita-med.component';

const routes: Routes = [
  {
    path:'perfil/:dni',
    component: PerfilComponent
  },
  {
    path:'citas',
    component: CitasComponent
  },
  {
    path:'citaprevia',
    component: CitapreviaComponent
  },
  {
    path:'pacientes',
    component: PacientesComponent
  },
  {
    path:'gestionar-cita-med',
    component: GestionarCitaMedComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
