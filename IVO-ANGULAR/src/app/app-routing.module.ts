import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CitasComponent } from './usuarios/citas/citas.component';
import { CitapreviaComponent } from './usuarios/citaprevia/citaprevia.component';
import { GestionarCitaMedComponent } from './usuarios/gestionar-cita-med/gestionar-cita-med.component';
import { HistorialComponent } from './usuarios/historial/historial.component';
import { SolicitarCitaComponent } from './usuarios/solicitar-cita/solicitar-cita.component';
import { LoginComponent } from './login/login.component';
import { ProfileComponent } from './profile/profile.component';
import { HistorialMedicoComponent } from './usuarios/historial-medico/historial-medico.component';
import { Medicamentos } from './models/medicamentos.model';
import { Informes } from './models/informes.model';
import { PacientesComponent } from './pacientes/pacientes.component';
import { InicioComponent } from './inicio/inicio.component';
import { PacienteGuard } from './guards/paciente.guard';
import { historias_clinicas } from './models/historias_clinicas.model';

const routes: Routes = [
  {
    path:'login',
    component: LoginComponent
  },
  {
    path:'profile',
    component: ProfileComponent
  },
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
    path:'solicitarCitas',
    component: SolicitarCitaComponent
  },
  {
    path:'historial',
    component: HistorialComponent
  },
  {
    path:'historialMedico',
    component: HistorialMedicoComponent
  },
  {
    path:'hedicamentos',
    component: Medicamentos
  },
  {
    path:'Informes',
    component: Informes
  },
  {
    path:'Historias_clinicas',
    component: historias_clinicas
  },
  {
    path: 'pacientes',
    component: PacientesComponent, canActivate:[PacienteGuard]
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
