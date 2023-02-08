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
import { NO_ERRORS_SCHEMA } from '@angular/core';

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
    
  ]

})
export class UsuariosModule { }
