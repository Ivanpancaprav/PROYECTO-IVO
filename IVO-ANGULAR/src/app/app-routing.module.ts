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
import { PerfilComponent } from './usuarios/perfil/perfil.component';
import { VerHistorialComponent } from './usuarios/ver-historial/ver-historial.component';
import { CrearHistoriaClinicaComponent } from './usuarios/crear-historia-clinica/crear-historia-clinica.component';

const routes: Routes = [
  {
    path:'',
    component: InicioComponent
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
    path:'perfil',
    component: ProfileComponent
  },
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
    path:'gestionar-cita-med',
    component: GestionarCitaMedComponent
  },
  {
    path:'solicitarCitas/:dni_paciente',
    component: SolicitarCitaComponent
  },
  {
    path:'mod_cita/:id_cita',
    component: GestionarCitaMedComponent
  },
  {
    path:'historial/:n_historia',
    component: HistorialComponent
  },
  {
    path:'informe/:id_informe',
    component: VerHistorialComponent
  },
  {
    path:'historialMedico/:dni_paciente',
    component: HistorialMedicoComponent
  },
  {
    path:'medicamentos',
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
    path:'crearhistoria',
    component: CrearHistoriaClinicaComponent
  },
  {
    path: 'pacientes',
    component: PacientesComponent, canActivate: [PacienteGuard],
  },
  {
    path: 'crearHistoria',
    component: CrearHistoriaClinicaComponent, canActivate: [PacienteGuard],
  },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
