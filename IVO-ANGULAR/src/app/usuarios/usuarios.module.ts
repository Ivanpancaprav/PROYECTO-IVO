import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PerfilComponent } from './perfil/perfil.component';
import { CitasComponent } from './citas/citas.component';
import { HistorialComponent } from './historial/historial.component';
import { CitapreviaComponent } from './citaprevia/citaprevia.component';
import { RouterModule } from '@angular/router';
import { SolicitarCitaComponent } from './solicitar-cita/solicitar-cita.component';
import { DataTablesModule } from 'angular-datatables';
import { ReactiveFormsModule } from '@angular/forms';
import { HammerModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
// USAR ng add igniteui-angular después ng update porsiaca
import { 
  IgxCalendarModule,
	IgxDialogModule,
  IgxButtonModule,
  IgxRippleModule,
} from "igniteui-angular";

import { GestionarCitaMedComponent } from './gestionar-cita-med/gestionar-cita-med.component';
import { BrowserModule } from "@angular/platform-browser";
import { VerHistorialComponent } from './ver-historial/ver-historial.component';


@NgModule({
  declarations: [
    PerfilComponent,
    CitasComponent,
    HistorialComponent,
    CitapreviaComponent,
    SolicitarCitaComponent,
    GestionarCitaMedComponent,
    VerHistorialComponent,
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
    ReactiveFormsModule,
    IgxButtonModule,
    IgxRippleModule
    
  ],
  exports: [
    PerfilComponent,
    CitasComponent,
    HistorialComponent,
    CitapreviaComponent,
    SolicitarCitaComponent,
    GestionarCitaMedComponent,
  ]

})
export class UsuariosModule { }
