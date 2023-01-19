import { Component, NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
<<<<<<< HEAD
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
=======
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { ModificarCitaComponent } from './usuarios/modificar-cita/modificar-cita.component';
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d

const routes: Routes = [
  {
    path:'perfil',
    component: PerfilComponent
  },
  {
    path:'citas',
    component: CitasComponent
<<<<<<< HEAD
=======
  },{
    path:'pacientes',
    component: PacientesComponent
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
  },
  {
    path:'citaprevia',
    component: CitapreviaComponent
  },
  {
<<<<<<< HEAD
    path:'pacientes',
    component: PacientesComponent
=======
    path:'solicitar-cita',
    component: SolicitarCitaComponent
  },
  {
    path:'historial',
    component: HistorialComponent
  }
  ,
  {
    path:'modificar-cita',
    component: ModificarCitaComponent
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
