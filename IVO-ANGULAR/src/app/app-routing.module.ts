import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
<<<<<<< HEAD
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
=======
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';

const routes: Routes = [
  {
    path:'perfil',
    component: PerfilComponent
  },
  {
    path:'citas',
    component: CitasComponent
<<<<<<< HEAD
  },{
    path:'pacientes',
    component: PacientesComponent
=======
  },
  {
    path:'citaprevia',
    component: CitapreviaComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
