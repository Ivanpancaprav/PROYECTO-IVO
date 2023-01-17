import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
<<<<<<< HEAD
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
=======
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
>>>>>>> cc21e21bc496cfd2a390b9c118c7c61dbcfd2561

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
>>>>>>> cc21e21bc496cfd2a390b9c118c7c61dbcfd2561
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
