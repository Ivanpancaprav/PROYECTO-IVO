import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { DataTablesModule } from "angular-datatables";
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { RouterModule } from '@angular/router';
import { UsuariosModule } from './usuarios/usuarios.module';

@NgModule({
  declarations: [
    AppComponent,
    NavComponent,
    FooterComponent,
  
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
<<<<<<< HEAD
    DataTablesModule
=======
    RouterModule,
    UsuariosModule
>>>>>>> cc21e21bc496cfd2a390b9c118c7c61dbcfd2561
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
