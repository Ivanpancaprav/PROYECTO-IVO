import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { GestionarCitaMedComponent } from './usuarios/gestionar-cita-med/gestionar-cita-med.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';
import { LoginComponent } from './login/login.component';
import { ProfileComponent } from './profile/profile.component';
import { HistorialMedicoComponent } from './usuarios/historial-medico/historial-medico.component';
import { Medicamentos } from './models/medicamentos.model';
import { PacientesComponent } from './pacientes/pacientes.component';
import { InicioComponent } from './inicio/inicio.component';

const routes: Routes = [
  {
    path:'perfil',
    component: ProfileComponent
  },
  {
    path:'',
    component: InicioComponent
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
  {
    path:'profile',
    component: ProfileComponent
  },
  {
    path:'HistorialMedico',
    component: HistorialMedicoComponent
  },
  {
    path:'Medicamentos',
    component: Medicamentos
  },
  {
    path: 'pacientes',
    component: PacientesComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
