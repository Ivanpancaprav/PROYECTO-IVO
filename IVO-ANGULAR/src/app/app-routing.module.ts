import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PacientesComponent } from './usuarios/pacientes/pacientes.component';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { GestionarCitaMedComponent } from './usuarios/gestionar-cita-med/gestionar-cita-med.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';
import { LoginComponent } from './login/login.component';
import { PacienteComponent } from './usuarios/paciente/paciente.component';
import { ProfileComponent } from './profile/profile.component';

const routes: Routes = [
  {
    path:'perfil',
    component: ProfileComponent
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
    path:'gestionar-cita-med',
    component: GestionarCitaMedComponent
  },
  {
    path:'historial',
    component: HistorialComponent
  },
  {
    path:'solicitarCitas',
    component: SolicitarCitaComponent
  },
  {
    path:'login',
    component: LoginComponent
  },
  //Rutas anidadas
  {
    path:'pacientes',
    component: PacientesComponent,
  },
  {
    path:'pacientes/:dni',
    component: PacientesComponent,
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
