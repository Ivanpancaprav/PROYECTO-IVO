import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { ModificarCitaComponent } from './usuarios/modificar-cita/modificar-cita.component';
import { GestionarCitaMedComponent } from './usuarios/gestionar-cita-med/gestionar-cita-med.component';

const routes: Routes = [
  {
    path:'perfil',
    component: PerfilComponent
  },
  {
    path:'citas',
    component: CitasComponent
  },{
    path:'pacientes',
    component: PacientesComponent
  },
  {
    path:'citaprevia',
    component: CitapreviaComponent
  },
  {
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
