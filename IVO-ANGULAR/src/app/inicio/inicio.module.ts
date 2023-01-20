import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LoginComponent } from './login/login.component';
import { RecuperarContrasenaComponent } from './recuperar-contrasena/recuperar-contrasena.component';
import { GestionarCitaMedComponent } from './gestionar-cita-med/gestionar-cita-med.component';



@NgModule({
  declarations: [
    LoginComponent,
    RecuperarContrasenaComponent,
    GestionarCitaMedComponent
  ],
  imports: [
    CommonModule
  ]
})
export class InicioModule { }
