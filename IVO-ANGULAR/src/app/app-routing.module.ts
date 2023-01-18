import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';

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
    path:'historial',
    component: HistorialComponent
  },
  {
    path:'solicitar-cita',
    component: SolicitarCitaComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
