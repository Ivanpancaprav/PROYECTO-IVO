import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { DataTablesModule } from "angular-datatables";
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NavComponent } from './nav/nav.component';
import { FooterComponent } from './footer/footer.component';
import { HttpClientModule } from '@angular/common/http';
import { UsuariosModule } from './usuarios/usuarios.module';
import { FormsModule } from '@angular/forms';
import { LoginComponent } from './login/login.component';
import { authInterceptorProviders } from './_helpers/auth.interceptor';
<<<<<<< HEAD
=======

>>>>>>> cc062da5c585f05092d776bae7f87cfa57403fd4
@NgModule({
  declarations: [
    AppComponent,
    NavComponent,
    FooterComponent,
    LoginComponent,
<<<<<<< HEAD
    
=======
>>>>>>> cc062da5c585f05092d776bae7f87cfa57403fd4
  ],
  imports: [
    DataTablesModule,
    BrowserAnimationsModule,
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    UsuariosModule
  ],
  providers: [authInterceptorProviders],
  bootstrap: [AppComponent]
})
export class AppModule {
}
