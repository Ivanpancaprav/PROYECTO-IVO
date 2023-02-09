import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { PacientesComponent } from './pacientes/pacientes.component';
import { HistorialComponent } from './historial/historial.component';
import { CitapreviaComponent } from './citaprevia/citaprevia.component';
import { RouterModule } from '@angular/router';
import { SolicitarCitaComponent } from './solicitar-cita/solicitar-cita.component';
import { ModificarCitaComponent } from './modificar-cita/modificar-cita.component';
import { GestionarCitaMedComponent } from './gestionar-cita-med/gestionar-cita-med.component';
import { DataTablesModule } from 'angular-datatables';
import { HammerModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
// USAR ng add igniteui-angular después ng update porsiaca
import { IgxCalendarModule } from 'igniteui-angular';
import { IgxDialogModule} from "igniteui-angular";
import { BrowserModule } from "@angular/platform-browser";
<<<<<<< HEAD
=======
import { PacienteComponent } from './paciente/paciente.component';

>>>>>>> cc062da5c585f05092d776bae7f87cfa57403fd4

@NgModule({
  declarations: [
    PerfilComponent,
    PacientesComponent,
    CitasComponent,
    HistorialComponent,
    CitapreviaComponent,
    SolicitarCitaComponent,
    ModificarCitaComponent,
    GestionarCitaMedComponent,
<<<<<<< HEAD
    
=======
    PacienteComponent
>>>>>>> cc062da5c585f05092d776bae7f87cfa57403fd4
  ],
  imports: [
    CommonModule,
    RouterModule,
    DataTablesModule,
    HammerModule,
    BrowserAnimationsModule,
    IgxCalendarModule,
    IgxDialogModule,
    BrowserModule,
    
  ],
  exports: [
    PerfilComponent,
    PacientesComponent,
    CitasComponent,
    HistorialComponent,
    CitapreviaComponent,
    SolicitarCitaComponent,
    ModificarCitaComponent,
    GestionarCitaMedComponent,
  ]

})
export class UsuariosModule { }
