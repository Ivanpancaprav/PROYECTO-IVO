import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
<<<<<<< HEAD

=======
import { DataTablesModule } from "angular-datatables";
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { RouterModule } from '@angular/router';
import { UsuariosModule } from './usuarios/usuarios.module';
import { DataTablesModule } from "angular-datatables";
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
    RouterModule,
    UsuariosModule,
=======
>>>>>>> 1f744a4360c18dd54da65145dd5fd9b7f90c4d1d
    DataTablesModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
