import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';

const routes: Routes = [
  {
    path:'perfil',
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
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
